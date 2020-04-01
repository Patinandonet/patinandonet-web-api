<?php

namespace App\Activities;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $appends = [
        "day_name",
        "hour_formatted",
        "instructor_name",
        "level_name",
        "zone_name",
    ];

    protected $connection = 'sqlite';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'zone_id',
        'level_id',
        'day_id',
        'hour_id',
        'instructor_id',
        'places_available',
        'free_places'
    ];

    public function zone()
    {
        return $this->belongsTo(\App\Activities\Zone::class);
    }

    public function level()
    {
        return $this->belongsTo(\App\Activities\Level::class);
    }

    public function day()
    {
        return $this->belongsTo(\App\Activities\Day::class);
    }

    public function hour()
    {
        return $this->belongsTo(\App\Activities\Hour::class);
    }

    public function instructor()
    {
        return $this->belongsTo(\App\Activities\Instructor::class);
    }

    public function getActivitiesByZoneDayHour(): Collection
    {
        return app(Activity::class)->all()->groupBy(['zone_id', 'day_id', 'hour_id'], $preserveKeys = true);
    }

    public function getDayNameAttribute()
    {
        return  $this->day()->getResults()->name;
    }

    public function getHourFormattedAttribute()
    {
        $hour = $this->hour()->getResults();
        return  $hour->start_hour . " - " . $hour->end_hour;
    }

    public function getInstructorNameAttribute()
    {
        return  $this->instructor()->getResults()->name;
    }

    public function getLevelNameAttribute()
    {
        return  $this->level()->getResults()->name;
    }

    public function getZoneNameAttribute()
    {
        return  $this->zone()->getResults()->name;
    }

    static public function countSecondLevelInArray(array $array): int
    {
        $ret = 0;
        foreach ($array as $value) {
            $ret = $ret + count($value);
        }
        return $ret;
    }

    static public function collectionIdsToCollectionObj(Collection $ids, Model $model): Collection
    {
        $ret = [];
        foreach ($ids as $id) {
            $class = get_class($model);
            $ret[] = app($class)->find($id->id);
        }
        return collect($ret);
    }
}
