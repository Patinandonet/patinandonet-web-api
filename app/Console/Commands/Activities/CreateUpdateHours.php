<?php

namespace App\Console\Commands\Activities;

use App\Console\Commands\CreateUpdateSQLite;
use App\Activities\Hour;

class CreateUpdateHours extends CreateUpdateSQLite
{
    protected $signature = 'create-update:hours';

    protected $description = 'Command description';

    protected function getSQLiteClass(): string
    {
        return Hour::class;
    }

    protected function getObjectsDict(): array
    {
        return [
            [
                'start_hour'  =>  '10:30',
                'end_hour'  =>  '11:30',
            ],
            [
                'start_hour'  =>  '11:35',
                'end_hour'  =>  '12:35',
            ],
            [
                'start_hour'  =>  '12:40',
                'end_hour'  =>  '13:40',
            ],
            [
                'start_hour'  =>  '18:00',
                'end_hour'  =>  '19:00',
            ],
            [
                'start_hour'  =>  '19:05',
                'end_hour'  =>  '20:05',
            ],
            [
                'start_hour'  =>  '20:10',
                'end_hour'  =>  '21:10',
            ],
            [
                'start_hour'  =>  '19:00',
                'end_hour'  =>  '21:00',
            ],
            [
                'start_hour'  =>  '20:00',
                'end_hour'  =>  '21:30',
            ],
            [
                'start_hour'  =>  '10:30',
                'end_hour'  =>  '12:00',
            ],
        ];
    }
}
