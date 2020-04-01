<?php

namespace App\Console\Commands\Activities;

use App\Console\Commands\CreateUpdateSQLite;
use App\Activities\Zone;

class CreateUpdateZones extends CreateUpdateSQLite
{
    protected $signature = 'create-update:zones';

    protected $description = 'Command description';

    protected function getSQLiteClass(): string
    {
        return Zone::class;
    }

    protected function getObjectsDict(): array
    {
        return [
            [
                'name' => 'Retiro'
            ],
            [
                'name' => 'Madrid Río'
            ],
            [
                'name' => 'Juan Carlos I'
            ],
            [
                'name' => 'Paseo de Camoens'
            ],
            [
                'name' => 'Velocidad (Cañaveral)'
            ]
        ];
    }
}
