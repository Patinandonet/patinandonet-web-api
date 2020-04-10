<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\WarmUp::class,
        Commands\Activities\CreateUpdateActivities::class,
        Commands\Activities\CreateUpdateDays::class,
        Commands\Activities\CreateUpdateHours::class,
        Commands\Activities\CreateUpdateHours::class,
        Commands\Activities\CreateUpdateInstructors::class,
        Commands\Activities\CreateUpdateLevels::class,
        Commands\Activities\CreateUpdateTypes::class,
        Commands\Activities\CreateUpdateZones::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //
    }
}
