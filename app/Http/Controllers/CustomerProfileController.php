<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\EmployeeLogin;
use App\TourCountry;
use App\TourLocation;
use App\Options;

use App\ErpEmployeeAnnouncement;
use App\ErpExpenses;

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
        $announcements = ErpEmployeeAnnouncement::latest()->paginate(10);

        $customer = Auth::user();
        $customer_id    = Auth::user()->id;


        return view('frontend.customer.home',compact('customer','countryList','locationList','current_option'));
    }




}
