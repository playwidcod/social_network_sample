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
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
<<<<<<< HEAD

=======
<<<<<<< HEAD
     * Register the commands for the application.
=======
     * Register the Closure based commands for the application.
>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
     *
     * @return void
     */
    protected function commands()
    {
<<<<<<< HEAD
        $this->load(__DIR__.'/Commands');

=======
<<<<<<< HEAD
        $this->load(__DIR__.'/Commands');

=======
>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
        require base_path('routes/console.php');
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
    }
}
