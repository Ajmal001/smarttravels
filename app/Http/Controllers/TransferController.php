<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransferInfo;
use App\TransferPic;
use App\TransferDrop;
use App\OptionsCurrency;

use Illuminate\Support\MessageBag;

use Image;
use Session;
use DB;

class TransferController extends Controller
{
    public function showTransfer(){
		$picList = TransferPic::latest()->paginate(10, ['*'], 'piclist');
		$dropList = TransferDrop::latest()->paginate(10, ['*'], 'droplist');
		$optionscurrency = OptionsCurrency::where('selected',1)->first(['currency']);
		return view('backend.website.website_transfer',compact('picList','dropList','optionscurrency'));
	}

	public function picDetails($transfer_id){

		$picDetails = DB::table('travel_transfer_pic')
							->where('transfer_id', '=', $transfer_id)
							->get();

		$infoDetails = DB::table('travel_transfer_info')
							->where('transfer_id', '=', $transfer_id)
							->get();

	    return view('backend.website.website_transfer_pic_details',compact('picDetails','infoDetails'));
	}

	public function dropDetails($transfer_id){

		$dropDetails = DB::table('travel_transfer_drop')
							->where('transfer_id', '=', $transfer_id)
							->get();

		$infoDetails = DB::table('travel_transfer_info')
							->where('transfer_id', '=', $transfer_id)
							->get();

		return view('backend.website.website_transfer_drop_details',compact('dropDetails','infoDetails'));
	}
}
