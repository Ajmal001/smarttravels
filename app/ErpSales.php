<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErpSales extends Model
{
    protected $primaryKey = 'sales_id';

    protected $guarded = [];

    public function customer()
    {
      return $this->belongsTo('App\ErpCustomers','sales_customer_id');
    }

    public function selleragent()
    {
        return $this->belongsTo('App\ErpAgent','sales_by_id');
    }

    public function selleremployee()
    {
        return $this->belongsTo('App\ErpEmployee','sales_by_id');
    }
}
