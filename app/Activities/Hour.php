<?php

namespace App\Activities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Hour extends Model
{
    protected $connection = 'sqlite';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'start_hour',
        'end_hour',
    ];
    protected $casts = [
        'id' => 'integer',
        'start_hour'  =>  'string',
        'end_hour'  =>  'string',
    ];

    public static function GetFirstByStartEnd($start, $end): Model
    {
        return App::make(Hour::class)->where("start_hour", $start)->where("end_hour", $end)->get()->first();
    }

    public function getActiveHoursFromZoneIdLevelIdDayId(int $zoneId, int $levelId, int $dayId): Collection
    {
        $collection = DB::connection('sqlite')->table('hours')
            ->join('activities',function ($join) use ($zoneId, $levelId, $dayId) {
                $join->on('hours.id', '=', 'activities.hour_id')
                    ->where('activities.zone_id', '=', $zoneId)
                    ->where('activities.level_id', '=', $levelId)
                    ->where('activities.day_id', '=', $dayId);
            })
            ->select('hours.id', 'hours.start_hour', 'hours.end_hour')->get()->unique('id');

        return $collection;
    }
}
