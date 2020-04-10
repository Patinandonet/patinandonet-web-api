<?php

namespace App\Console\Commands\Activities;

use App\Console\Commands\CreateUpdateSQLite;
use App\Activities\Day;

class CreateUpdateDays extends CreateUpdateSQLite
{
    protected $signature = 'create-update:days';

    protected $description = 'Command description';

    protected function getSQLiteClass(): string
    {
        return Day::class;
    }

    protected function getObjectsDict(): array
    {
        return [
            [
                'name' => 'Domingo'
            ],
            [
                'name' => 'Lunes'
            ],
            [
                'name' => 'Martes'
            ],
            [
                'name' => 'Miércoles'
            ],
            [
                'name' => 'Jueves'
            ],
            [
                'name' => 'Viernes'
            ],
            [
                'name' => 'Sábado'
            ]
        ];
    }
}
