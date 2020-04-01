<?php

namespace App\Activities;

use App\Traits\GetFirstModelByName;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
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
