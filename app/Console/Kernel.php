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
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $filePath = '/var/log/apollo/schedule.log';
        $schedule->command('lottery:send dlt xidiancc@gmail.com wliu.way@foxmail.com')
            ->cron('0 21 * * 1,3,6')
            ->appendOutputTo($filePath);

        $schedule->command('lottery:send ssq xidiancc@gmail.com wliu.way@foxmail.com')
            ->cron('0 22 * * 2,4,7')
            ->appendOutputTo($filePath);
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
