<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferPic extends Model
{
    protected $table = "travel_transfer_pic";
	protected $primaryKey = 'pic_id';
	
	public function TransferInfo()
    {
        return $this->hasOne('App\TransferInfo','transfer_id');
    }
}
