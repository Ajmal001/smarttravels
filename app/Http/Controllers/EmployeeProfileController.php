<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\EmployeeLogin;
use App\TourCountry;
use App\TourLocation;
use App\Options;

class EmployeeProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:employee');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.employee.home');
    }

    protected function guard()
    {
        return Auth::guard('employee');
    }

    public function employeeHome()
    {
        $countryList = TourCountry::get();
        $locationList = TourLocation::get();
        $current_option = Options::get()->first();

        return view('frontend.employee.home',compact('countryList','locationList','current_option'));
    }



}
