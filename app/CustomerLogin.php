<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CustomerLogin extends Authenticatable
{
    protected $table = "erp_customers";
    protected $primaryKey = 'customer_id';


/*
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

/*
    public function profile()
    {
        return $this->hasOne(ErpCustomers::class, 'customer_id');
    }
*/
    public function messages()
    {
      return $this->hasMany(ErpCustomerSupport::class, 'customer_id');
    }
}
