<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ErpCustomerSupport;

class ErpSupportsController extends Controller
{

    public function customerMessages()
    {
      $messages = ErpCustomerSupport::with(['customer','customerdetails'])
                                    ->latest()
                                    ->distinct()
                                    ->get(['customer_id']);
      $messagedetails = [];
      foreach ($messages as $value) {
        $messagedetails[] = ErpCustomerSupport::where('customer_id',$value->customer_id)
                                              ->where('message_by', 'customer')
                                              ->latest()
                                              ->first(['customer_id','message_status','message_details','created_at']);
      }
      // return $messagedetails;
      return view('backend.erp.supports.messages',compact('messages','messagedetails'));
    }


    public function singleCustomerMessages($customer_id)
    {
      $customermessages = ErpCustomerSupport::with(['customer'])
                  ->where('customer_id',$customer_id)
                  ->orderBy('id', 'ASC')
                  ->get();
      $customer = ErpCustomerSupport::with(['customer','customerdetails'])
                  ->latest()
                  ->where('customer_id',$customer_id)
                  ->first();


      $lastmessage = ErpCustomerSupport::where('customer_id',$customer_id)
                                            ->where('message_by', 'customer')
                                            ->latest()
                                            ->first(['id']);
      $lastmessageid = $lastmessage['id'];

      $unseen = ErpCustomerSupport::find($lastmessageid);
      if($unseen->message_status == 'unseen'){
        $unseen->message_status = 'seen';
        $unseen->save();
      }

      // return $unseen;
      return view('backend.erp.supports.customermessages',compact('customermessages','customer'));
    }

    public function customerMessagesReplay(Request $request)
    {
        $replay = new ErpCustomerSupport();
        $replay->customer_id     = $request->customer_id;
        $replay->message_by      = $request->message_by;
        $replay->message_details = $request->message_details;
        $replay->message_status  = $request->message_status;
        $replay->save();

        return back();
    }


}
