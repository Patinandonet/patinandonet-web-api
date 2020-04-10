<?php

namespace App\Activities;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetFirstModelByName;

class Type extends Model
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
}
