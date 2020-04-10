<?php

namespace App\Activities;

use App\Traits\GetFirstModelByName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Zone extends Model
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

    public function getActiveZones(): Collection
    {
        $collection = DB::connection('sqlite')->table('zones')
            ->join('activities', 'zones.id', '=', 'activities.zone_id')
            ->select('zones.id')->get()->unique('id');

        return Activity::collectionIdsToCollectionObj($collection, $this);
    }
}
