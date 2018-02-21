<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ErpSales;
use App\ErpCustomers;
use App\ErpEmployee;
use App\ErpAgent;

use Session;
use DB;

class ErpSalesController extends Controller
{
    public function showSales(){

      $allsales = ErpSales::with('customer')->get();
      $customers = ErpCustomers::all();
      return view('backend.erp.sales.sales', compact('allsales','customers'));
    }

    public function addSales(Request $request){
      $insert = new ErpSales();

  		$insert->sales_item_type = $request->input('sales_item_type');
  		$insert->sales_item_name = $request->input('sales_item_name');
  		$insert->sales_sku = $request->input('sales_sku');
  		$insert->payment_type = $request->input('payment_type');
  		$insert->payment_method = $request->input('payment_method');
  		$insert->payment_info = $request->input('payment_info');
  		$insert->sales_price = $request->input('sales_price');
  		$insert->sales_date = $request->input('sales_date');
  		$insert->sales_customer_id = $request->input('sales_customer_id');
  		$insert->sales_by_type = $request->input('sales_by_type');
  		$insert->sales_by_id = $request->input('sales_by_id');
  		$insert->sales_customer_rating = $request->input('sales_customer_rating');

  		$insert->save();
  		Session::flash('flash_message_insert', 'Sales Added Successfully !');

  		return redirect('/adminerpsales');
    }


    public function detailsSales($sales_id)
    {

      $seller_type = ErpSales::where('sales_id', $sales_id)->get(['sales_by_type']);

      if ($seller_type[0]['sales_by_type'] == 'Agent') {

        $sales = ErpSales::with(['customer','selleragent'])->find($sales_id);

      } else if ($seller_type[0]['sales_by_type'] == 'Employee') {

        $sales = ErpSales::with(['customer','selleremployee'])->find($sales_id);

      }

      return response()->json(['salesdetails' => $sales]);
    }

    public function editSales($sales_id)
    {
      $seller_type = ErpSales::find($sales_id);

      if ($seller_type['sales_by_type'] == 'Agent') {

        $agent = ErpAgent::get(['agent_id','agent_name']);

        return response()->json(
          [
            'salesdata' => $seller_type,
            'sellerdata'=> $agent
          ]
        );

      } else if ($seller_type['sales_by_type'] == 'Employee') {

        $employee = ErpEmployee::get(['employee_id','employee_name']);

        return response()->json(
          [
            'salesdata' => $seller_type,
            'sellerdata'=> $employee
          ]
        );

      }

    }


    public function updateSales(Request $request, $sales_id){

      $update = ErpSales::find($sales_id);

  		$update->sales_item_type = $request->input('sales_item_type');
  		$update->sales_item_name = $request->input('sales_item_name');
  		$update->sales_sku = $request->input('sales_sku');
      $update->payment_type = $request->input('payment_type');
  		$update->payment_method = $request->input('payment_method');
  		$update->payment_info = $request->input('payment_info');
  		$update->sales_price = $request->input('sales_price');
  		$update->sales_date = $request->input('sales_date');
  		$update->sales_customer_id = $request->input('sales_customer_id');
  		$update->sales_by_type = $request->input('sales_by_type');
  		$update->sales_by_id = $request->input('sales_by_id');
  		$update->sales_customer_rating = $request->input('sales_customer_rating');

  		$update->save();
  		Session::flash('flash_message_insert', 'Sales Updated Successfully !');

  		return redirect('/adminerpsales');
    }

    public function deleteSales(Request $request, $sales_id){
      $sales_id = $request->input('sales_id');
      DB::table('erp_sales')->where('sales_id',$sales_id)->delete();
      Session::flash('flash_message_delete', 'Sales Deleted !');
      return redirect('/adminerpsales');
    }

    // QUERY FOR SELLER TYPE NAME
    public function sellerTypeName(Request $request)
    {
      $type = $request->input('sellertype');

      if($type == 'Employee'){

        $employee = ErpEmployee::get(['employee_id','employee_name']);
        return response()->json([
          'sellertype' => 'employee',
          'sellername' => $employee
        ]);

      }elseif ($type == 'Agent') {

        $agent = ErpAgent::get(['agent_id','agent_name']);
        return response()->json([
          'sellertype' => 'agent',
          'sellername' => $agent
        ]);

      }
    }

}
