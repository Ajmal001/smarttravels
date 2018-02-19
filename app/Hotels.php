<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotels extends Model
{
    protected $table = "travel_hotels";
	  protected $primaryKey = 'hotel_id';
}
