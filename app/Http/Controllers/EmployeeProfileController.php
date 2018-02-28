<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\EmployeeLogin;
use App\TourCountry;
use App\TourLocation;
use App\Options;

use Auth;
use File;

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

        $employee = Auth::user();

        return view('frontend.employee.home',compact('countryList','locationList','current_option','employee'));
    }
    
    public function employeeProfileEdit()
    {
        $countryList    = TourCountry::get();
        $locationList   = TourLocation::get();
        $current_option = Options::get()->first();
        $employee = Auth::user();

        return view('frontend.employee.editprofile',compact('countryList','locationList','current_option','employee'));

    }

    public function employeeProfileUpdate(Request $request)
    {
        $employee = Auth::user();

        //Image
        if($request->hasFile('employee_image')){
            $image = $request->file('employee_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $request->employee_image->move(public_path('backendimages'), $filename);
        }
        elseif($employee->profile->employee_image){
            $filename = $employee->profile->employee_image;
        }
        else{
            $filename = 'employee_dafault.png';
        }
        

        $employee->profile->update([
            'employee_phone'        => $request->employee_phone,
            'employee_address'      => $request->employee_address,
            'employee_nid'          => $request->employee_nid,
            'employee_designation'  => $request->employee_designation,
            'employee_details'      => $request->employee_details,
            'employee_image'        => $filename
        ]);

        return redirect('/employeehome');

    }

    public function employeeTasks()
    {
        $countryList    = TourCountry::get();
        $locationList   = TourLocation::get();
        $current_option = Options::get()->first();

        $employee = Auth::user();
        $tasks    = $employee->tasks;

        return view('frontend.employee.tasklist',compact('tasks','employee','countryList','locationList','current_option'));


        // return $tasks;
    }
    
    public function employeeAttendences()
    {
        $countryList    = TourCountry::get();
        $locationList   = TourLocation::get();
        $current_option = Options::get()->first();

        $employee    = Auth::user();
        $attendences = $employee->attendences;

        return view('frontend.employee.attendence',compact('attendences','employee','countryList','locationList','current_option'));


        //return $attendences;
    }

}
