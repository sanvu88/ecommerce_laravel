<?php

namespace App\Console\Commands\VRSG;

use App\Scraper\VRSG;
use Illuminate\Console\Command;

class VRSGScrapeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:vrsg {type}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Craw data from vuonrausaigon.com';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $bot = new VRSG();

        if ($this->argument('type') == 'category') {
            $bot->scrapeCategory();
        }

        if ($this->argument('type') == 'product'){
            $bot->scrapeProduct();
        }

    }
}
