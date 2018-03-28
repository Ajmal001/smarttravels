<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionsCurrency extends Model
{
    protected $table = "options_currency";
    protected $fillable = ['country','currency','selected'];
}
