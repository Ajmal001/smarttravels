<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\EmployeeLogin;
use App\TourCountry;
use App\TourLocation;
use App\Options;

use App\CustomerLogin;
use App\ErpSales;
use App\ErpCustomerSupport;

use Auth;
use File;
use Carbon\Carbon;
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

        $customer = Auth::user();

        return view('frontend.customer.home',compact('customer','countryList','locationList','current_option'));
    }


    public function customerProfileEdit()
    {
        $countryList = TourCountry::get();
        $locationList = TourLocation::get();
        $current_option = Options::get()->first();

        $customer = Auth::user();

        return view('frontend.customer.editprofile',compact('customer','countryList','locationList','current_option'));
    }


    public function customerProfileUpdate(Request $request)
    {
        $customer = Auth::user();

        //Image
        if($request->hasFile('customer_image')){
            $image = $request->file('customer_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $request->customer_image->move(public_path('backendimages'), $filename);
        }
        elseif($customer->profile->customer_image){
            $filename = $customer->profile->customer_image;
        }
        else{
            $filename = 'customer_dafault.png';
        }

        // Customer Name
        $customer->update([
          'name'  => $request->name
        ]);

        // Customer Profile
        $customer->profile->update([
            'customer_nid'          => $request->customer_nid,
            'customer_phone'        => $request->customer_phone,
            'customer_address'      => $request->customer_address,
            'customer_company'      => $request->customer_company,
            'customer_country'      => $request->customer_country,
            'customer_city'         => $request->customer_zip,
            'customer_zip'          => $request->customer_city,
            'customer_profession'   => $request->customer_profession,
            'customer_passport_no'  => $request->customer_passport_no,
            'customer_facebook'     => $request->customer_facebook,
            'customer_linkedin'     => $request->customer_linkedin,
            'customer_image'        => $filename
        ]);

        return redirect('/customerhome');

    }

    // Package which customer have Brought
    public function customerPackages()
    {
        $countryList = TourCountry::get();
        $locationList = TourLocation::get();
        $current_option = Options::get()->first();

        $customer = Auth::user();
        $customer_id = Auth::user()->id;
        $cutomerpackages = ErpSales::where('sales_customer_id',$customer_id)->latest()->paginate(10);

        return view('frontend.customer.packages',compact('customer','cutomerpackages','countryList','locationList','current_option'));
    }

    public function customerSuports()
    {
        $countryList = TourCountry::get();
        $locationList = TourLocation::get();
        $current_option = Options::get()->first();
        $customer = Auth::user();
        $customer_id = Auth::user()->id;

        $customersupports = ErpCustomerSupport::where('customer_id',$customer_id)->latest()->paginate(10);

        return view('frontend.customer.supports',compact('customersupports','customer','countryList','locationList','current_option'));
    }

    public function customerSuportsAdd()
    {
        $countryList = TourCountry::get();
        $locationList = TourLocation::get();
        $current_option = Options::get()->first();

        $customer = Auth::user();

        return view('frontend.customer.supportscreate',compact('customer','countryList','locationList','current_option'));
    }

    public function customerSuportsCreate(Request $request)
    {
        $customer_id = Auth::user()->id;

        $create = new ErpCustomerSupport();
        $create->customer_id     = $customer_id;
        $create->message_by      = $request->message_by;
        $create->message_details = $request->message_details;
        $create->message_status  = $request->message_status;
        $create->save();

        return redirect('/customersupports');
    }

}
