<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Giàn, kệ, chậu trồng rau thông minh',
                'slug' => Str::slug('Giàn, kệ, chậu trồng rau thông minh'),
            ],
            [
                'name' => 'Chậu lắp ghép thông minh',
                'slug' => Str::slug('Chậu lắp ghép thông minh '),
            ],
            [
                'name' => 'Đất trồng và phân bón',
                'slug' => Str::slug('Đất trồng và phân bón '),
            ],
            [
                'name' => 'Hạt giống',
                'slug' => Str::slug('Hạt giống'),
            ],
        ]);
    }
}
