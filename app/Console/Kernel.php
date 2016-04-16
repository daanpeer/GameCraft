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
        // Commands\Inspire::class,
        Commands\CreateServer::class,
        Commands\SeverStatusses::class,
        Commands\ProvisionServers::class,
        Commands\ServerPipeline::class,
        Commands\DestroyServer::class,
        Commands\PauseServer::class,
        Commands\ResumeServer::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//        $schedule->command('server:pipeline')->everyMinute();

        // $schedule->command('inspire')
        //          ->hourly();
    }
}
