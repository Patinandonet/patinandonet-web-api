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
            // Lunes
            [
                'zone_id' => $zone_id,
                'day_id' => Day::GetFistByName("Lunes")->id,
                'hour_id' => Hour::GetFirstByStartEnd("19:05", "20:05")->id,
                'level_id' => Level::GetFistByName("Medio")->id,
                'instructor_id' => Instructor::GetFistByName("Dani")->id,
                'places_available' => 9,
                'free_places' => 5,
            ],

            // Martes
            [
                'zone_id' => $zone_id,
                'day_id' => Day::GetFistByName("Martes")->id,
                'hour_id' => Hour::GetFirstByStartEnd("18:00", "19:00")->id,
                'level_id' => Level::GetFistByName("Experto")->id,
                'instructor_id' => Instructor::GetFistByName("Rubs")->id,
                'places_available' => 9,
                'free_places' => 4,
            ],
            [
                'zone_id' => $zone_id,
                'day_id' => Day::GetFistByName("Martes")->id,
                'hour_id' => Hour::GetFirstByStartEnd("19:05", "20:05")->id,
                'level_id' => Level::GetFistByName("Freestyle 1")->id,
                'instructor_id' => Instructor::GetFistByName("Rubs")->id,
                'places_available' => 9,
                'free_places' => 4,
            ],
            [
                'zone_id' => $zone_id,
                'day_id' => Day::GetFistByName("Martes")->id,
                'hour_id' => Hour::GetFirstByStartEnd("20:10", "21:10")->id,
                'level_id' => Level::GetFistByName("Slalom")->id,
                'instructor_id' => Instructor::GetFistByName("Rubs")->id,
                'places_available' => 9,
                'free_places' => 0,
            ],

            // Miércoles
            [
                'zone_id' => $zone_id,
                'day_id' => Day::GetFistByName("Miércoles")->id,
                'hour_id' => Hour::GetFirstByStartEnd("19:05", "20:05")->id,
                'level_id' => Level::GetFistByName("Básico")->id,
                'instructor_id' => Instructor::GetFistByName("Rubs")->id,
                'places_available' => 9,
                'free_places' => 5,
            ],
            [
                'zone_id' => $zone_id,
                'day_id' => Day::GetFistByName("Miércoles")->id,
                'hour_id' => Hour::GetFirstByStartEnd("19:05", "20:05")->id,
                'level_id' => Level::GetFistByName("Experto")->id,
                'instructor_id' => Instructor::GetFistByName("Dani")->id,
                'places_available' => 9,
                'free_places' => 2,
            ],
            [
                'zone_id' => $zone_id,
                'day_id' => Day::GetFistByName("Miércoles")->id,
                'hour_id' => Hour::GetFirstByStartEnd("20:10", "21:10")->id,
                'level_id' => Level::GetFistByName("Avanzado")->id,
                'instructor_id' => Instructor::GetFistByName("Rubs")->id,
                'places_available' => 9,
                'free_places' => 5,
            ],
            [
                'zone_id' => $zone_id,
                'day_id' => Day::GetFistByName("Miércoles")->id,
                'hour_id' => Hour::GetFirstByStartEnd("20:10", "21:10")->id,
                'level_id' => Level::GetFistByName("Freestyle 1")->id,
                'instructor_id' => Instructor::GetFistByName("Dani")->id,
                'places_available' => 9,
                'free_places' => 0,
            ],

            // Jueves
            [
                'zone_id' => $zone_id,
                'day_id' => Day::GetFistByName("Jueves")->id,
                'hour_id' => Hour::GetFirstByStartEnd("19:05", "20:05")->id,
                'level_id' => Level::GetFistByName("Avanzado")->id,
                'instructor_id' => Instructor::GetFistByName("Dani")->id,
                'places_available' => 9,
                'free_places' => 3,
            ],
            [
                'zone_id' => $zone_id,
                'day_id' => Day::GetFistByName("Jueves")->id,
                'hour_id' => Hour::GetFirstByStartEnd("19:05", "20:05")->id,
                'level_id' => Level::GetFistByName("Slalom")->id,
                'instructor_id' => Instructor::GetFistByName("Diego")->id,
                'places_available' => 9,
                'free_places' => 0,
            ],
            [
                'zone_id' => $zone_id,
                'day_id' => Day::GetFistByName("Jueves")->id,
                'hour_id' => Hour::GetFirstByStartEnd("20:10", "21:10")->id,
                'level_id' => Level::GetFistByName("Medio")->id,
                'instructor_id' => Instructor::GetFistByName("Dani")->id,
                'places_available' => 9,
                'free_places' => 0,
            ],
            [
                'zone_id' => $zone_id,
                'day_id' => Day::GetFistByName("Jueves")->id,
                'hour_id' => Hour::GetFirstByStartEnd("20:10", "21:10")->id,
                'level_id' => Level::GetFistByName("Experto")->id,
                'instructor_id' => Instructor::GetFistByName("Diego")->id,
                'places_available' => 9,
                'free_places' => 0,
            ],

            // Viernes
            [
                'zone_id' => $zone_id,
                'day_id' => Day::GetFistByName("Viernes")->id,
                'hour_id' => Hour::GetFirstByStartEnd("18:00", "19:00")->id,
                'level_id' => Level::GetFistByName("Niños Básico")->id,
                'instructor_id' => Instructor::GetFistByName("Pablo")->id,
                'places_available' => 9,
                'free_places' => 3,
            ],
            [
                'zone_id' => $zone_id,
                'day_id' => Day::GetFistByName("Viernes")->id,
                'hour_id' => Hour::GetFirstByStartEnd("18:00", "19:00")->id,
                'level_id' => Level::GetFistByName("Niños Medio")->id,
                'instructor_id' => Instructor::GetFistByName("Dani")->id,
                'places_available' => 9,
                'free_places' => 0,
            ],
            [
                'zone_id' => $zone_id,
                'day_id' => Day::GetFistByName("Viernes")->id,
                'hour_id' => Hour::GetFirstByStartEnd("18:00", "19:00")->id,
                'level_id' => Level::GetFistByName("Medio")->id,
                'instructor_id' => Instructor::GetFistByName("Rubs")->id,
                'places_available' => 9,
                'free_places' => 4,
            ],
            [
                'zone_id' => $zone_id,
                'day_id' => Day::GetFistByName("Viernes")->id,
                'hour_id' => Hour::GetFirstByStartEnd("19:05", "20:05")->id,
                'level_id' => Level::GetFistByName("Básico")->id,
                'instructor_id' => Instructor::GetFistByName("Rubs")->id,
                'places_available' => 9,
                'free_places' => 9,
            ],
            [
                'zone_id' => $zone_id,
                'day_id' => Day::GetFistByName("Viernes")->id,
                'hour_id' => Hour::GetFirstByStartEnd("19:05", "20:05")->id,
                'level_id' => Level::GetFistByName("Avanzado")->id,
                'instructor_id' => Instructor::GetFistByName("Dani")->id,
                'places_available' => 9,
                'free_places' => 5,
            ],

            // Sábado
            [
                'zone_id' => $zone_id,
                'day_id' => Day::GetFistByName("Sábado")->id,
                'hour_id' => Hour::GetFirstByStartEnd("10:30", "11:30")->id,
                'level_id' => Level::GetFistByName("Experto")->id,
                'instructor_id' => Instructor::GetFistByName("Rubs")->id,
                'places_available' => 9,
                'free_places' => 3,
            ],
            [
                'zone_id' => $zone_id,
                'day_id' => Day::GetFistByName("Sábado")->id,
                'hour_id' => Hour::GetFirstByStartEnd("11:35", "12:35")->id,
                'level_id' => Level::GetFistByName("Medio")->id,
                'instructor_id' => Instructor::GetFistByName("Rubs")->id,
                'places_available' => 9,
                'free_places' => 3,
            ],
            [
                'zone_id' => $zone_id,
                'day_id' => Day::GetFistByName("Sábado")->id,
                'hour_id' => Hour::GetFirstByStartEnd("11:35", "12:35")->id,
                'level_id' => Level::GetFistByName("Niños Medio")->id,
                'instructor_id' => Instructor::GetFistByName("Pablo")->id,
                'places_available' => 9,
                'free_places' => 3,
            ],
            [
                'zone_id' => $zone_id,
                'day_id' => Day::GetFistByName("Sábado")->id,
                'hour_id' => Hour::GetFirstByStartEnd("12:40", "13:40")->id,
                'level_id' => Level::GetFistByName("Niños Medio")->id,
                'instructor_id' => Instructor::GetFistByName("Rubs")->id,
                'places_available' => 9,
                'free_places' => 3,
            ],
            [
                'zone_id' => $zone_id,
                'day_id' => Day::GetFistByName("Sábado")->id,
                'hour_id' => Hour::GetFirstByStartEnd("12:40", "13:40")->id,
                'level_id' => Level::GetFistByName("Niños Medio")->id,
                'instructor_id' => Instructor::GetFistByName("Pablo")->id,
                'places_available' => 9,
                'free_places' => 3,
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

        $zone_id = Zone::GetFistByName("Velocidad (Cañaveral)")->id;
        $canaveral = [
            [
                'zone_id' => $zone_id,
                'level_id' => Level::GetFistByName("Velocidad Entrenamientos")->id,
                'day_id' => Day::GetFistByName("Miércoles")->id,
                'hour_id' => Hour::GetFirstByStartEnd("20:00", "21:30")->id,
                'instructor_id' => Instructor::GetFistByName("Luigi")->id,
                'places_available' => 14,
                'free_places' => 10,
            ],
        ];

        return array_merge($retiro, $rio, $canaveral);
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
