<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErpEmployee extends Model
{
  protected $table = "erp_employees_info";
  protected $primaryKey = 'employee_id';
  protected $guarded = [];

}
