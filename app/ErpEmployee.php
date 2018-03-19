<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErpEmployee extends Model
{
  protected $table = "erp_employees_info";
  protected $primaryKey = 'id';
  protected $guarded = [];

  public function employee()
  {
      return $this->belongsTo(EmployeeLogin::class);
  }

  public function attendence()
  {
    return $this->hasMany(ErpEmployeeAttendence::class,'employee_id');
  }
}
