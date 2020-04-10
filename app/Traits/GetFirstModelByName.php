<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

trait GetFirstModelByName
{
    public static function GetFistByName($name): Model
    {
        return App::make(get_called_class())->where("name", $name)->get()->first();
    }
}
