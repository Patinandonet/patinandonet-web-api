<?php

namespace App\Activities;

use App\Traits\GetFirstModelByName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Level extends Model
{
    use GetFirstModelByName;

    protected $connection = 'sqlite';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'description',
        'type_id',
    ];
    protected $casts = [
        'id' => 'integer',
        'name'  =>  'string',
        'description'  =>  'string',
    ];

    public function type()
    {
        return $this->belongsTo(\App\Activities\Type::class);
    }

    public function getLevelsByType(): Collection
    {
        return app(Level::class)->all()->groupBy('type_id');
    }

    public function getActiveLevelsFromZoneId(int $zoneId): Collection
    {
        $collection = DB::connection('sqlite')->table('levels')
            ->join('activities',function ($join) use ($zoneId) {
                $join->on('levels.id', '=', 'activities.level_id')
                    ->where('activities.zone_id', '=', $zoneId);
            })
            ->select('levels.id', 'levels.name')->get()->unique('id');

        return $collection;
    }

    public function getActiveLevels(): Collection
    {
        $collection = DB::connection('sqlite')->table('levels')
            ->join('activities', 'levels.id', '=', 'activities.level_id')
            ->select('levels.id')->get()->unique('id');

        return Activity::collectionIdsToCollectionObj($collection, $this);
    }
}
