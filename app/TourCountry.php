<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourCountry extends Model
{
    protected $table = "tour_country";
    protected $primaryKey = 'country_id';

    public function locations()
    {
        return $this->hasMany(TourLocation::class,'country_id','country_id');
    }
}
