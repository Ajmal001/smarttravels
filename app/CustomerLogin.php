<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CustomerLogin extends Authenticatable
{
    protected $table = "erp_customer_login";
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne(ErpCustomers::class,'customer_id');
    }
}
