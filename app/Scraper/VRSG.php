<?php

namespace App\Scraper;


use App\Models\Category;
use App\Models\Product;
use Goutte\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mockery\Exception;
use Symfony\Component\DomCrawler\Crawler;

class VRSG
{
    const BASE_URL = 'http://vuonrausaigon.com';

    public function scrapeCategory()
    {
        $url = self::BASE_URL;
        $client = new Client();

        try {
            $crawler = $client->request('GET', $url);

            $crawler->filter('#all_category_btn_b.parentMenu #your-customize-category ul.list-unstyled li')->each(function (Crawler $node) {
                if ($node->filter('a')->attr('type') == 'button') {
                    $category = $this->insertCategory($node);

                    $node->parents()->filter('.sub-cat ul.list-unstyled li.hello_test')->each(function (Crawler $node) use ($category) {
                        $this->insertCategory($node, $category->id);
                    });
                }
                if ($node->filter('a')->attr('type') != 'button' && $node->attr('class') != 'hello_test') {
                    $this->insertCategory($node);
                }
            });
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    public function scrapeProduct()
    {
        $categories = Category::root()->get();

        foreach($categories as $category) {
            $url = self::BASE_URL . '/danh-muc/' . $category->slug . '.html';
            $client = new Client();

            try {
                $crawler = $client->request('GET', $url);
                $crawler->filter('section.products_container div.product_item figure')->each(function (Crawler $node) {
                    $client = new Client();
                    $url = self::BASE_URL . $node->filter('figcaption h5 a')->attr('href');
                    $crawler = $client->request('GET', $url);

                    $category_slug = Str::slug($crawler->filter('section.breadcrumbs ul li')->last()->filter('a span')->text());
                    $category = Category::where('slug', '=', $category_slug)->first();

                    $crawler->filter('section.content_center div.row.clearfix')->each(function (Crawler $node) use ($category) {
                        $product = $this->insertProduct($node, $category);
                        print 'Done ' . $product->name . "\n";
                    });
                });

                $crawler->filter('ul.pagination li')->each(function (Crawler $node) {
                    if ($node->attr('class') == '') {
                        $client = new Client();
                        $url = $node->filter('a')->attr('href');
                        $crawler = $client->request('GET', $url);

                        $crawler->filter('section.products_container div.product_item figure')->each(function (Crawler $node) {
                            $client = new Client();
                            $url = self::BASE_URL . $node->filter('figcaption h5 a')->attr('href');
                            $crawler = $client->request('GET', $url);

                            $category_slug = Str::slug($crawler->filter('section.breadcrumbs ul li')->last()->filter('a span')->text());
                            $category = Category::where('slug', '=', $category_slug)->first();

                            $crawler->filter('section.content_center div.row.clearfix')->each(function (Crawler $node) use ($category) {
                                $product = $this->insertProduct($node, $category);
                                print 'Done ' . $product->name . "\n";
                            });
                        });
                    }
                });
            } catch (Exception $exception) {
                echo $exception->getMessage();
            }
        }

        return;
    }

    private function insertProduct($node, $category) {
        $name = $node->filter('h1[itemprop="name"]')->text();
        $sku = $node->filter('img[itemprop="sku"]')->attr('content');
        $shortDescription = $node->filter('p[itemprop="description"]')->text();
        $longDescription = $node->filter('section.tabs_content .post_content')->html();
        $price = $node->filter('#product_price')->text();
        $price = preg_replace('/\./', '', $price);
        $price = preg_replace('/\đ/', '', $price);
        $promotionPrice = $node->filter('.v_align_b f_size_ex_large');
        if ($promotionPrice->count()) {
            $promotionPrice = $promotionPrice->text();
            $promotionPrice = preg_replace('/\./', '', $promotionPrice);
            $promotionPrice = preg_replace('/\đ/', '', $promotionPrice);
        } else {
            $promotionPrice = $price;
        }

        $imageSrc = $node->filter('img[itemprop="image"]')->attr('data-zoom-image');
        $file = @file_get_contents($imageSrc);
        $thumbnailName = 'thumbnail_' . $sku . '_' . time() . '.png';
        $thumbnailPath = 'images/product/' . $sku . '/thumbnail';
        Storage::put($thumbnailPath. '/' . $thumbnailName, $file);

        $product = Product::updateOrCreate([
            'sku' => $sku,
            'name' => $name,
            'slug' => Str::slug($name),
            'short_description' => $shortDescription,
            'long_description' => $longDescription,
            'promotion_price' => (float)$promotionPrice,
            'price' => (float)$price,
            'status' => 1,
            'amount' => 100,
            'thumbnail_filename' => $thumbnailName,
            'thumbnail_path' => $thumbnailPath,
        ]);
        if (isset($category)) {
            $category->products()->attach($product->id);
            if (isset($category->parent)) {
                $category->parent->products()->attach($product->id);
            }
        }

        return $product;
    }

    private function insertCategory($node, $parent = null)
    {
        $name = $node->filter('a')->text();
        $href = $node->filter('a')->attr('href');
        $href = explode('/', $href);
        $slug = str_replace('.html', '', $href[count($href) - 1]);
        return $category = Category::updateOrCreate(['name' => $name, 'slug' => $slug, 'parent_id' => $parent]);
    }
}
