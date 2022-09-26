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
        Commands\ProcessRoutineOlympusStaffDump::class
    ];
	
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
		$schedule->command('backup:clean')->weekly()->sundays()->at('01:00')->timezone('Africa/Lagos');
        $schedule->command('backup:run')->weekly()->sundays()->at('01:30')->timezone('Africa/Lagos');
        $schedule->command('process-olympus-staff-dump')->dailyAt('02:30')->timezone('Africa/Lagos');
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
