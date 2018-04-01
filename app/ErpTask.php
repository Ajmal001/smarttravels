<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErpTask extends Model
{
    protected $primaryKey = 'task_id';

    public function employee()
    {
        return $this->belongsTo(ErpEmployee::class);
    }
}
