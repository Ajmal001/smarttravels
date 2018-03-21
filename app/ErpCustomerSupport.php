<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErpCustomerSupport extends Model
{
    protected $table   = 'erp_customer_support';
    protected $guarded = [];

    public function customer()
    {
      return $this->belongsTo(CustomerLogin::class);
    }

    public function customerdetails()
    {
      return $this->belongsTo(ErpCustomers::class,'customer_id');
    }

}
