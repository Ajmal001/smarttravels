<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErpEmployee extends Model
{
  protected $primaryKey = 'employee_id';
  protected $guarded = [];

  public function employee()
  {
      return $this->belongsTo(EmployeeLogin::class);
  }
}
