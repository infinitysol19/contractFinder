<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\ApiOneData;
use App\Jobs\ApiTwoData;
use App\Jobs\ApiThreeData;
class GobalCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'globalrun:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'globalrun cron';

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
     * @return int
     */
    public function handle()
    {
                  ApiOneData::dispatch()
                    ->delay(now()->addSeconds(5));

                  ApiTwoData::dispatch()
                    ->delay(now()->addSeconds(5));

                  ApiThreeData::dispatch()
                    ->delay(now()->addSeconds(5));
    }
}
