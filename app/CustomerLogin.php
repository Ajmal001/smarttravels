<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CustomerLogin extends Authenticatable
{
    protected $table = "erp_customer_login";
}
