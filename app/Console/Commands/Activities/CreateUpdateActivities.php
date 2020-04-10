<?php

namespace App\Console\Commands\Activities;

use App\Activities\Day;
use App\Activities\Hour;
use App\Activities\Instructor;
use App\Activities\Level;
use App\Activities\Zone;
use App\Console\Commands\CreateUpdateSQLite;
use App\Activities\Activity;

class CreateUpdateActivities extends CreateUpdateSQLite
{
    protected $signature = 'create-update:activities';

    protected $description = 'Command description';

    protected function getSQLiteClass(): string
    {
        return Activity::class;
    }

    protected function getObjectsDict(): array
    {
        $zone_id = Zone::GetFistByName("Retiro")->id;
        $retiro = [
            [
                'zone_id' => $zone_id,
                'level_id' => Level::GetFistByName("Básico")->id,
                'day_id' => Day::GetFistByName("Lunes")->id,
                'hour_id' => Hour::GetFirstByStartEnd("19:05", "20:05")->id,
                'instructor_id' => Instructor::GetFistByName("Dani")->id,
                'places_available' => 14,
                'free_places' => 10,
            ],
            [
                'zone_id' => $zone_id,
                'level_id' => Level::GetFistByName("Experto")->id,
                'day_id' => Day::GetFistByName("Martes")->id,
                'hour_id' => Hour::GetFirstByStartEnd("18:00", "19:00")->id,
                'instructor_id' => Instructor::GetFistByName("Rubs")->id,
                'places_available' => 14,
                'free_places' => 2,
            ],
            [
                'zone_id' => $zone_id,
                'level_id' => Level::GetFistByName("Medio")->id,
                'day_id' => Day::GetFistByName("Martes")->id,
                'hour_id' => Hour::GetFirstByStartEnd("19:05", "20:05")->id,
                'instructor_id' => Instructor::GetFistByName("Dani")->id,
                'places_available' => 14,
                'free_places' => 11,
            ],
            [
                'zone_id' => $zone_id,
                'level_id' => Level::GetFistByName("Freestyle 1")->id,
                'day_id' => Day::GetFistByName("Martes")->id,
                'hour_id' => Hour::GetFirstByStartEnd("19:05", "20:05")->id,
                'instructor_id' => Instructor::GetFistByName("Rubs")->id,
                'places_available' => 14,
                'free_places' => 11,
            ],
        ];

        $zone_id = Zone::GetFistByName("Madrid Río")->id;
        $rio = [
            [
                'zone_id' => $zone_id,
                'level_id' => Level::GetFistByName("Slalom")->id,
                'day_id' => Day::GetFistByName("Lunes")->id,
                'hour_id' => Hour::GetFirstByStartEnd("19:05", "20:05")->id,
                'instructor_id' => Instructor::GetFistByName("Rubs")->id,
                'places_available' => 14,
                'free_places' => 10,
            ],
        ];
        return array_merge($retiro, $rio);
    }

    public function handle()
    {
        $entities = [
            CreateUpdateDays::class,
            CreateUpdateHours::class,
            CreateUpdateInstructors::class,
            CreateUpdateTypes::class,
            CreateUpdateLevels::class,
            CreateUpdateZones::class,
        ];
        foreach ($entities as $entity) {
            $entity = new $entity;
            /* @var $entity CreateUpdateSQLite */
            $entity->handle();
        }

        return parent::handle();
    }
}
