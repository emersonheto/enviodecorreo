<?php

namespace App\Console;

use App\Console\Commands\cronEmail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{ 
    // protected $commands = [
    //     'App\Console\Commands\cronEmail'
    // ];

    protected $commands = [
         cronEmail::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //A ESTA HORA SE REPETIRA EL JOBTODOS LOS DIAS 
        $schedule->command('command:cronEmail')->everyMinute();
                 //esta es la hora del hosting
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
