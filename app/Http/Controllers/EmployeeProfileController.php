<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\EmployeeLogin;
use App\TourCountry;
use App\TourLocation;
use App\Options;

use App\ErpEmployeeAnnouncement;

use Auth;
use File;
use Carbon\Carbon;
use DB;

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
        $announcements = ErpEmployeeAnnouncement::get();

        $employee = Auth::user();
        $employee_id    = Auth::user()->id;

        $attendences_this_month = DB::table('erp_employee_attendences')
                                  ->whereMonth('date',date('n'))
                                  ->where('employee_id','=',$employee_id)
                                  ->count();

        $taskpending = DB::table('erp_tasks')
                      ->where('task_assigned_to', $employee_id)
                      ->where('task_status', 0)
                      ->count();

        return view('frontend.employee.home',compact('attendences_this_month','taskpending','announcements','employee','countryList','locationList','current_option'));
    }

    public function employeeProfileEdit()
    {
        $countryList    = TourCountry::get();
        $locationList   = TourLocation::get();
        $current_option = Options::get()->first();
        $announcements  = ErpEmployeeAnnouncement::get();
        $employee = Auth::user();

        $employee = Auth::user();
        $employee_id    = Auth::user()->id;

        $attendences_this_month = DB::table('erp_employee_attendences')
                                  ->whereMonth('date',date('n'))
                                  ->where('employee_id','=',$employee_id)
                                  ->count();

        $taskpending = DB::table('erp_tasks')
                      ->where('task_assigned_to', $employee_id)
                      ->where('task_status', 0)
                      ->count();

        return view('frontend.employee.editprofile',compact('attendences_this_month','taskpending','announcements','employee','countryList','locationList','current_option'));

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

        // Employee name,password need to update later...

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
        $announcements  = ErpEmployeeAnnouncement::get();

        $employee = Auth::user();
        $employee_id    = Auth::user()->id;

        $attendences_this_month = DB::table('erp_employee_attendences')
                                  ->whereMonth('date',date('n'))
                                  ->where('employee_id','=',$employee_id)
                                  ->count();

        $taskpending = DB::table('erp_tasks')
                      ->where('task_assigned_to', $employee_id)
                      ->where('task_status', 0)
                      ->count();

        $today = Carbon::now();
        $employee = Auth::user();
        $tasks = $employee->tasks()->paginate(5);

        return view('frontend.employee.tasklist',compact('attendences_this_month','taskpending','announcements','tasks','employee','countryList','locationList','current_option','today'));
    }

    public function employeeAttendences()
    {
        $countryList    = TourCountry::get();
        $locationList   = TourLocation::get();
        $current_option = Options::get()->first();
        $announcements  = ErpEmployeeAnnouncement::get();

        $employee = Auth::user();
        $employee_id    = Auth::user()->id;

        $attendences_this_month = DB::table('erp_employee_attendences')
                                  ->whereMonth('date',date('n'))
                                  ->where('employee_id','=',$employee_id)
                                  ->count();

        $taskpending = DB::table('erp_tasks')
                      ->where('task_assigned_to', $employee_id)
                      ->where('task_status', 0)
                      ->count();

        $employee    = Auth::user();
        $attendences = DB::table('erp_employee_attendences')
                      ->where('employee_id','=',$employee_id)
                      ->get();

        return view('frontend.employee.attendence',compact('attendences_this_month','taskpending','announcements','attendences','employee','countryList','locationList','current_option'));
    }

    public function employeeExpense(){
        $countryList    = TourCountry::get();
        $locationList   = TourLocation::get();
        $current_option = Options::get()->first();
        $announcements  = ErpEmployeeAnnouncement::get();

        $employee = Auth::user();
        $employee_id    = Auth::user()->id;

        $attendences_this_month = DB::table('erp_employee_attendences')
                                  ->whereMonth('date',date('n'))
                                  ->where('employee_id','=',$employee_id)
                                  ->count();

        $taskpending = DB::table('erp_tasks')
                      ->where('task_assigned_to', $employee_id)
                      ->where('task_status', 0)
                      ->count();

        $employee    = Auth::user();
        return view('frontend.employee.expense',compact('attendences_this_month','taskpending','announcements','employee','countryList','locationList','current_option'));
    }

}
