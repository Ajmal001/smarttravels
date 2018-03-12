<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ErpCustomerRequest;

use App\ErpCustomers;

use Image;
use Session;
use DB;

class ErpCustomerController extends Controller
{

    function showCustomerBox(){
      $allcustomer = ErpCustomers::all();
      return view('backend.erp.customer.customer_box', compact('allcustomer'));
    }

    function showCustomer(){
      $allcustomer = ErpCustomers::all();
      return view('backend.erp.customer.customer', compact('allcustomer'));
    }

  	function createCustomer(ErpCustomerRequest $request){
  		$insert = new ErpCustomers();

  		$insert->customer_name = $request->input('customer_name');
  		$insert->customer_email = $request->input('customer_email');
  		$insert->customer_phone = $request->input('customer_phone');
  		$insert->customer_address = $request->input('customer_address');
  		$insert->customer_nid = $request->input('customer_nid');
  		$insert->customer_passport_no = $request->input('customer_passport_no');
  		$insert->customer_facebook = $request->input('customer_facebook');
  		$insert->customer_linkedin = $request->input('customer_linkedin');
  		$insert->customer_profession = $request->input('customer_profession');
  		$insert->customer_company = $request->input('customer_company');
  		$insert->customer_city = $request->input('customer_city');
  		$insert->customer_country = $request->input('customer_country');
  		$insert->customer_zip = $request->input('customer_zip');
  		// $insert->customer_rating = $request->input('customer_rating');
  		$insert->customer_source = $request->input('customer_source');

  		//Image

  		if($request->hasFile('customer_image')){
  			$image = $request->file('customer_image');
  			$filename = time().'.'.$image->getClientOriginalExtension();
  			Image::make($image)->save(public_path('/backendimages/'.$filename));
  			$insert->customer_image = $filename;
  		}
  		else{
  			$filename = 'customer_dafault.png';
  			$insert->customer_image = $filename;
  		}

  		$insert->save();
  		Session::flash('flash_message_insert', 'Customer Added Successfully !');
  		$customer = ErpCustomers::get();
  		return redirect('/adminerpcustomer');
  	}

    public function editCustomer($id)
    {
      $customer = ErpCustomers::find($id);

      return response()->json(['customerdata' => $customer]);
    }

    public function detailsCustomer($id)
    {
      $customer = ErpCustomers::find($id);

      $total_rating = DB::table('erp_sales')
                  ->where('sales_customer_id', $id)
                  ->sum('sales_customer_rating');

      $numuber_or_rows = DB::table('erp_sales')
                ->where('sales_customer_id', $id)
                ->count();

      if($total_rating != 0){
        $avg_rating = $total_rating / $numuber_or_rows;
        $avg_rating = number_format($avg_rating, 2, '.', '');
      }

      return response()->json(['customerdata' => $customer , 'avg_rating'=> $avg_rating]);

    }


    public function updateCustomer(Request $request,$id){
      $edit = ErpCustomers::find($id);
      $edit->customer_name = $request->input('customer_name');
      $edit->customer_email = $request->input('customer_email');
      $edit->customer_phone = $request->input('customer_phone');
      $edit->customer_address = $request->input('customer_address');
      $edit->customer_nid = $request->input('customer_nid');
      $edit->customer_passport_no = $request->input('customer_passport_no');
      $edit->customer_facebook = $request->input('customer_facebook');
      $edit->customer_linkedin = $request->input('customer_linkedin');
      $edit->customer_profession = $request->input('customer_profession');
      $edit->customer_company = $request->input('customer_company');
      $edit->customer_city = $request->input('customer_city');
      $edit->customer_country = $request->input('customer_country');
      $edit->customer_zip = $request->input('customer_zip');
      // $edit->customer_rating = $request->input('customer_rating');
      $edit->customer_source = $request->input('customer_source');

      //Image

      if($request->hasFile('customer_image')){
        $image = $request->file('customer_image');
        $filename = time().'.'.$image->getClientOriginalExtension();
        Image::make($image)->save(public_path('/backendimages/'.$filename));
        $edit->customer_image = $filename;
      }
      else{
        $filename = 'customer_dafault.png';
        $edit->customer_image = $filename;
      }

      $edit->save();
      Session::flash('flash_message_insert', 'Customer Updated Successfully !');
      return redirect('/adminerpcustomer');
    }

    public function deleteCustomer(Request $request, $customer_id){
      $customer_id = $request->input('customer_id');
  		DB::table('erp_customers')->where('customer_id',$customer_id)->delete();
      Session::flash('flash_message_delete', 'Customer Deleted !');
  		return redirect('/adminerpcustomer');
  	}

    public function searchCustomer(Request $request)
    {
        $item = $request->customer_item;
        $type = $request->customer_type;

        $customers = ErpCustomers::where( $type, 'LIKE', '%' . $item . '%' )->get();
        if( count($customers) > 0 ){
          return view('backend.erp.customer.customer_search', compact('customers'));
        }else{
          $customers = '';
          return view('backend.erp.customer.customer_search', compact('customers'));
        }

    }


}
