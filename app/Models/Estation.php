<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estation extends Model
{
    public function getCityName()
    {

        return $this->belongsTo(City::class, 'cityId', 'id');
    }
}
