<?php

namespace App\Console\Commands\Activities;

use App\Activities\Type;
use App\Console\Commands\CreateUpdateSQLite;

class CreateUpdateTypes extends CreateUpdateSQLite
{
    protected $signature = 'create-update:types';

    protected $description = 'Command description';

    protected function getSQLiteClass(): string
    {
        return Type::class;
    }

    protected function getObjectsDict(): array
    {
        return [
            [
                'name' => 'Escuelas técnicas'
            ],
            [
                'name' => 'Escuelas de disciplinas'
            ],
            [
                'name' => 'Escuelas para niños/as'
            ],
        ];
    }
}
