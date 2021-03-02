<?php

namespace App\Console\Commands\Activities;

use App\Console\Commands\CreateUpdateSQLite;
use App\Activities\Instructor;

class CreateUpdateInstructors extends CreateUpdateSQLite
{
    protected $signature = 'create-update:instructors';

    protected $description = 'Command description';

    protected function getSQLiteClass(): string
    {
        return Instructor::class;
    }

    protected function getObjectsDict(): array
    {
        return [
            [
                'name' => 'Dani'
            ],
            [
                'name' => 'Rubs'
            ],
            [
                'name' => 'Diego'
            ],
            [
                'name' => 'Pablo'
            ],
            [
                'name' => 'Luigi'
            ],
        ];
    }
}
