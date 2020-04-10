<?php

namespace App\Activities;

use App\Traits\GetFirstModelByName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Day extends Model
{
    use GetFirstModelByName;

    protected $connection = 'sqlite';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name'
    ];
    protected $casts = [
        'id' => 'integer',
        'name'  =>  'string',
    ];

    public function getActiveDaysFromZoneIdLevelId(int $zoneId, int $levelId): Collection
    {
        $collection = DB::connection('sqlite')->table('days')
            ->join('activities',function ($join) use ($zoneId, $levelId) {
                $join->on('days.id', '=', 'activities.day_id')
                    ->where('activities.zone_id', '=', $zoneId)
                    ->where('activities.level_id', '=', $levelId);
            })
            ->select('days.id', 'days.name')->get()->unique('id');

        return $collection;
    }
}
