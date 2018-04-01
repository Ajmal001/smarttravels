<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErpExpenses extends Model
{
    protected $table = 'erp_expenses';
    protected $primaryKey = 'expense_id';

    public function employee()
    {
        return $this->hasMany(ErpEmployee::class,'employee_id','expense_added_by');
    }

}
