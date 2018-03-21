<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ErpCustomerSupport;

class ErpSupportsController extends Controller
{

    public function customerMessages()
    {
      $messages = ErpCustomerSupport::with(['customer','customerdetails'])->latest()->distinct()->get(['customer_id']);

      return view('backend.erp.supports.messages',compact('messages','messagedetails'));
    }


    public function customerMessagesReplay(Request $request)
    {
        $admin_id = Auth::user()->id;

        $replay = new ErpCustomerSupport();
        $replay->customer_id     = $request->customer_id;
        $replay->message_by      = $admin_id;
        $replay->message_details = $request->message_details;
        $replay->message_status  = 'replied';
        $replay->save();

        return $request->all();
    }

    public function singleCustomerMessages($customer_id)
    {
      $customermessages = ErpCustomerSupport::where('customer_id',$customer_id)->get();

      return view('backend.erp.supports.customermessages',compact('customermessages'));
    }


}
