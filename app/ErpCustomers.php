<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErpCustomers extends Model
{
    protected $primaryKey = 'customer_id';
    protected $guarded = [];


    public function sales()
    {
      return $this->hasMany('App\ErpSales','customer_id');
    }

    public function customer()
    {
        return $this->belongsTo(ErpCustomers::class);
    }


}
