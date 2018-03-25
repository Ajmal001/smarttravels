<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErpCustomers extends Model
{
    protected $primaryKey = 'customer_id';
    protected $guarded = [];

    protected $fillable = ['customer_name', 'customer_nid', 'customer_phone', 'customer_address', 'customer_company', 'customer_country'];

    public function sales()
    {
      return $this->hasMany('App\ErpSales','customer_id');
    }

    public function customer()
    {
        return $this->belongsTo(ErpCustomers::class);
    }


}
