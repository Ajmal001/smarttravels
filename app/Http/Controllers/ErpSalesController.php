<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ErpSales;
use App\ErpCustomers;
use App\ErpEmployee;
use App\ErpAgent;
use App\OptionsCurrency;

use Session;
use DB;

class ErpSalesController extends Controller
{
    public function showSales(){

      $allsales = ErpSales::with('customer')->latest()->paginate(10);
      $customers = ErpCustomers::all();
  		$optionscurrency = OptionsCurrency::where('selected',1)->first(['currency']);
      return view('backend.erp.sales.sales', compact('allsales','customers','optionscurrency'));
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
  		$insert->commision_type = $request->input('commision_type');
  		$insert->commision_rate = $request->input('commision_rate');
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

        $agent = ErpAgent::get(['id','name']);

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
  		$update->commision_type = $request->input('commision_type');
  		$update->commision_rate = $request->input('commision_rate');
  		$update->commision_percent_amount = ($request->input('sales_price')*$request->input('commision_rate'))/100;

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

        $agent = ErpAgent::get(['id','name']);
        return response()->json([
          'sellertype' => 'agent',
          'sellername' => $agent
        ]);

      }
    }

    // SEARCH YEAR
    public function salesYearSearch()
    {
      $salesdates = ErpSales::latest()->pluck('sales_date');
      $salesdate = [];
      foreach ($salesdates as $dates) {
        $salesdate[] = date('Y', strtotime($dates));
      }
      $salesdates = array_unique($salesdate, SORT_NUMERIC );
      return response()->json(['salesyears'=>$salesdates]);
    }

    public function searchSalesYear(Request $request)
    {
        $customers = ErpCustomers::all();
    		$optionscurrency = OptionsCurrency::where('selected',1)->first(['currency']);

        $year = $request->sales_search_year;
        $searchsales = ErpSales::whereYear( 'sales_date', 'LIKE', '%' . $year . '%' )->get();
        if( count($searchsales) > 0 ){
          return view('backend.erp.sales.salessearch', compact('searchsales','customers','optionscurrency'));
        }else{
          $searchsales = '';
          return view('backend.erp.sales.salessearch', compact('searchsales','customers','optionscurrency'));
        }

    }

    // SEARCH MONTH
    public function salesMonthSearch()
    {
      $salesdates = ErpSales::latest()->pluck('sales_date');
      $salesdate = [];
      foreach ($salesdates as $dates) {
        $salesdate[] = date('Y-m', strtotime($dates));
      }
      $salesdates = array_unique($salesdate, SORT_REGULAR );
      return response()->json(['salesmonths'=>$salesdates]);
    }

    public function searchSalesMonth(Request $request)
    {
        $customers = ErpCustomers::all();
    		$optionscurrency = OptionsCurrency::where('selected',1)->first(['currency']);

        $month = $request->sales_search_month;
        $searchsales = ErpSales::where( 'sales_date', 'LIKE', '%' . $month . '%' )->get();
        if( count($searchsales) > 0 ){
          return view('backend.erp.sales.salessearch', compact('searchsales','customers','optionscurrency'));
        }else{
          $searchsales = '';
          return view('backend.erp.sales.salessearch', compact('searchsales','customers','optionscurrency'));
        }

    }

    // SEARCH DAY
    public function salesDaySearch()
    {
      $salesdates = ErpSales::latest()->pluck('sales_date');
      $salesdate = [];
      foreach ($salesdates as $dates) {
        $salesdate[] = date('Y-m-d', strtotime($dates));
      }
      $salesdates = array_unique($salesdate, SORT_REGULAR );
      return response()->json(['salesdays'=>$salesdates]);
    }

    public function searchSalesDay(Request $request)
    {
        $customers = ErpCustomers::all();
    		$optionscurrency = OptionsCurrency::where('selected',1)->first(['currency']);

        $day = $request->sales_search_day;
        $searchsales = ErpSales::whereDate( 'sales_date', 'LIKE', '%' . $day . '%' )->get();
        if( count($searchsales) > 0 ){
          return view('backend.erp.sales.salessearch', compact('searchsales','customers','optionscurrency'));
        }else{
          $searchsales = '';
          return view('backend.erp.sales.salessearch', compact('searchsales','customers','optionscurrency'));
        }

    }

}
