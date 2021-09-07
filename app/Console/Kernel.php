<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array 
     */
    protected $commands = [
        //
        'App\Console\Commands\ApiOne',
        'App\Console\Commands\ApiTwo',
        'App\Console\Commands\ApiThree',
        'App\Console\Commands\GobalCron',
    ];
  
    /** 
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('apione:cron')->daily();
        // $schedule->command('apitwo:cron')->daily();
        // $schedule->command('apithree:cron')->daily();
         $schedule->command('globalrun:cron')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
