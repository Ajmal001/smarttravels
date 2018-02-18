<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ErpSales;
use App\ErpCustomers;

use Session;
use DB;

class ErpSalesController extends Controller
{
    public function showSales(){
      $allsales = ErpSales::all();
      $customers = ErpCustomers::all();
      return view('backend.erp.sales.sales', compact('allsales','customers'));
    }

    public function addSales(Request $request){
      $insert = new ErpSales();

  		$insert->sales_item_type = $request->input('sales_item_type');
  		$insert->sales_item_name = $request->input('sales_item_name');
  		$insert->sales_sku = $request->input('sales_sku');
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
      $sales = ErpSales::find($sales_id);

      return response()->json(['salesdetails' => $sales]);
    }

    public function editSales($sales_id)
    {
      $sales = ErpSales::find($sales_id);

      return response()->json(['salesdata' => $sales]);
    }


    public function updateSales(Request $request, $sales_id){

      $update = ErpSales::find($sales_id);

  		$update->sales_item_type = $request->input('sales_item_type');
  		$update->sales_item_name = $request->input('sales_item_name');
  		$update->sales_sku = $request->input('sales_sku');
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

}
