<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
<<<<<<< HEAD
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
=======
     */
    protected function schedule(Schedule $schedule): void
>>>>>>> 68f77847fbb0ee6791645980157172509f5ecb5c
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
<<<<<<< HEAD
     *
     * @return void
     */
    protected function commands()
=======
     */
    protected function commands(): void
>>>>>>> 68f77847fbb0ee6791645980157172509f5ecb5c
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
