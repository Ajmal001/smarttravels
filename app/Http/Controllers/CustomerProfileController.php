<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TourCountry;
use App\TourLocation;
use App\Options;

use App\TourPackages;

use App\CustomerLogin;
use App\ErpCustomers;
use App\ErpSales;
use App\ErpCustomerSupport;
use App\OptionsCurrency;

use Auth;
use File;
use Carbon\Carbon;
use Image;
use Session;
use DB;

class CustomerProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.customer.home');
    }

    protected function guard()
    {
        return Auth::guard('customer');
    }

    public function customerHome()
    {
        $countryList = TourCountry::get();
        $locationList = TourLocation::get();
        $current_option = Options::get()->first();
        $exclusive_packages = TourPackages::orderBy('package_id', 'desc')->take(10)->get();

        $customer = Auth::user();

        return view('frontend.customer.home',compact('customer','countryList','locationList','current_option','exclusive_packages'));
    }


    public function customerProfileEdit()
    {
        $countryList = TourCountry::get();
        $locationList = TourLocation::get();
        $current_option = Options::get()->first();
        $exclusive_packages = TourPackages::orderBy('package_id', 'desc')->take(10)->get();

        $customer = Auth::user();

        return view('frontend.customer.editprofile',compact('exclusive_packages','customer','countryList','locationList','current_option'));
    }


    public function customerProfileUpdate(Request $request)
    {

        $id = $request->input('customer_id');

        $edit = ErpCustomers::find($id);
        $edit->customer_name = $request->input('customer_name');
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
        $edit->customer_source = $request->input('customer_source');

        // Image
        if($request->hasFile('customer_image')){
      			$image = $request->file('customer_image');
      			$filename = time().'.'.$image->getClientOriginalExtension();
      			Image::make($image)->resize(300,300)->save(public_path('/backendimages/'.$filename));
      			$edit->customer_image = $filename;
      		}
      		else{
      			$filename = $edit->customer_image;
      			$edit->customer_image = $filename;
      		}

        $edit->save();
        Session::flash('flash_message_update', 'Your Profile Updated Successfully !');
        return redirect('/customerhome');

    }

    public function customerPayment()
    {
        $countryList = TourCountry::get();
        $locationList = TourLocation::get();
        $current_option = Options::get()->first();
        $exclusive_packages = TourPackages::orderBy('package_id', 'desc')->take(10)->get();
    		$optionscurrency = OptionsCurrency::where('selected',1)->first(['currency']);

        $customer = Auth::user();
        $customer_id = Auth::user()->customer_id;

        $cutomerPayment = ErpSales::where('sales_customer_id',$customer_id)
                                    ->orderBy('sales_id', 'asc')
                                    ->paginate(10);

        $totalCash = ErpSales::where('sales_customer_id',$customer_id)
                            ->where('payment_type','cash')
                            ->sum('sales_price');

        $totalDue = ErpSales::where('sales_customer_id',$customer_id)
                            ->where('payment_type','due')
                            ->sum('sales_price');

        return view('frontend.customer.payments',compact('totalDue','totalCash','exclusive_packages','customer','cutomerPayment','countryList','locationList','current_option','optionscurrency'));
    }

    public function customerSuports()
    {
        $countryList = TourCountry::get();
        $locationList = TourLocation::get();
        $current_option = Options::get()->first();
        $customer = Auth::user();
        $customer_id = Auth::user()->customer_id;
        $exclusive_packages = TourPackages::orderBy('package_id', 'desc')->take(10)->get();

        return view('frontend.customer.supports',compact('exclusive_packages','customer','countryList','locationList','current_option'));
    }

    public function customerSuportsJson()
    {
        $customer_id = Auth::user()->customer_id;

        $customersupports = ErpCustomerSupport::where('customer_id',$customer_id)
                                              ->orderBy('id', 'ASC')
                                              ->get();

        return view('frontend.customer.adminmessageajax',compact('customersupports'));
    }

    public function customerSuportsAdd()
    {
        $countryList = TourCountry::get();
        $locationList = TourLocation::get();
        $current_option = Options::get()->first();
        $exclusive_packages = TourPackages::orderBy('package_id', 'desc')->take(10)->get();

        $customer = Auth::user();

        return view('frontend.customer.supportscreate',compact('exclusive_packages','customer','countryList','locationList','current_option'));
    }

    public function customerSuportsCreate(Request $request)
    {
        $customer_id = Auth::user()->customer_id;

        $create = new ErpCustomerSupport();
        $create->customer_id     = $customer_id;
        $create->message_by      = $request->message_by;
        $create->message_details = $request->message_details;
        $create->message_status  = $request->message_status;
        $create->save();

        return redirect('/customersupports');
    }

    public function customerAccount()
    {
        $countryList = TourCountry::get();
        $locationList = TourLocation::get();
        $current_option = Options::get()->first();
        $customer = Auth::user();
        $exclusive_packages = TourPackages::orderBy('package_id', 'desc')->take(10)->get();

        return view('frontend.customer.customeraccount',compact('customer','exclusive_packages','countryList','locationList','current_option'));
    }

    public function customerAccountUpdate(Request $request)
    {
      $newpassword = $request->newpassword;
      $renewpassword = $request->renewpassword;

      $customer_id = Auth::user()->customer_id;

      if($newpassword === $renewpassword){

        $password = ErpCustomers::where('customer_id',$customer_id)->update(['password'=>bcrypt($newpassword)]);
        $password = DB::table('erp_customer_login')->where('id',$customer_id)->update(['password'=>bcrypt($newpassword)]);

        Session::flash('flash_message_update', 'Password Updated Successfully.');
        return back();

      }else{
        Session::flash('flash_error_message', 'Password done not match !');
        return back();
      }
    }


}
