<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ErpAgent extends Authenticatable
{

    protected $table = "erp_agents";
    protected $primaryKey = 'id';

    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'agent_phone', 'agent_area', 'agent_image'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


}
