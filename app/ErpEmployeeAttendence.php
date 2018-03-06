<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErpEmployeeAttendence extends Model
{
    protected $primaryKey = 'attendence_id';

    public function employee()
    {
      return $this->belongsTo(ErpEmployee::class,'employee_id');
    }
}
