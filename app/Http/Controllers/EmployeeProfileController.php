<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\EmployeeLogin;
use App\TourCountry;
use App\TourLocation;
use App\Options;

use App\ErpEmployee;
use App\ErpEmployeeAnnouncement;
use App\ErpExpenses;
use App\OptionsCurrency;

use Auth;
use File;
use Carbon\Carbon;
use DB;
use Hash;

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
        $announcements = ErpEmployeeAnnouncement::latest()->paginate(10);

        $employee = Auth::user();
        $employee_id    = Auth::user()->employee_id;

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
        $announcements  = ErpEmployeeAnnouncement::latest()->paginate(10);
        $employee = Auth::user();

        $employee = Auth::user();
        $employee_id    = Auth::user()->employee_id;

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
        $employee_id = Auth::user()->employee_id;
        $employee = ErpEmployee::find($employee_id);

        //Image
        if($request->hasFile('employee_image')){
            $image = $request->file('employee_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $request->employee_image->move(public_path('backendimages'), $filename);
        }else{
          $filename = 'employee_dafault.png';
        }

        $employee->update([
            'employee_name'         => $request->employee_name,
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
        $announcements  = ErpEmployeeAnnouncement::latest()->paginate(10);

        $employee = Auth::user();
        $employee_id    = Auth::user()->employee_id;

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
        $tasks = $employee->tasks()->latest()->paginate(10);

        return view('frontend.employee.tasklist',compact('attendences_this_month','taskpending','announcements','tasks','employee','countryList','locationList','current_option','today'));
    }

    public function employeeAttendences()
    {
        $countryList    = TourCountry::get();
        $locationList   = TourLocation::get();
        $current_option = Options::get()->first();
        $announcements  = ErpEmployeeAnnouncement::latest()->paginate(10);

        $employee = Auth::user();
        $employee_id = Auth::user()->employee_id;

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
                      ->whereMonth('date', date('n'))
                      ->get();

        return view('frontend.employee.attendence',compact('attendences_this_month','taskpending','announcements','attendences','employee','countryList','locationList','current_option'));
    }

    public function employeeExpense(){
        $countryList    = TourCountry::get();
        $locationList   = TourLocation::get();
        $current_option = Options::get()->first();
        $announcements  = ErpEmployeeAnnouncement::latest()->paginate(10);

        $employee = Auth::user();
        $employee_id    = Auth::user()->employee_id;

        $attendences_this_month = DB::table('erp_employee_attendences')
                                  ->whereMonth('date',date('n'))
                                  ->where('employee_id','=',$employee_id)
                                  ->count();

        $taskpending = DB::table('erp_tasks')
                      ->where('task_assigned_to', $employee_id)
                      ->where('task_status', 0)
                      ->count();

        $employee = Auth::user();
        $expenses = DB::table('erp_expenses')
                      ->whereMonth('expense_date',date('n'))
                      ->where('expense_added_by','=',$employee_id)
                      ->latest()
                      ->paginate(10);

        $optionscurrency = OptionsCurrency::where('selected',1)->first(['currency']);

        return view('frontend.employee.expense',compact('expenses','attendences_this_month','taskpending','announcements','employee','countryList','locationList','current_option','optionscurrency'));
    }

    public function employeeExpenseAdd()
    {
      $countryList    = TourCountry::get();
      $locationList   = TourLocation::get();
      $current_option = Options::get()->first();
      $announcements  = ErpEmployeeAnnouncement::latest()->paginate(10);
      $employee       = Auth::user();

      $employee_id            = Auth::user()->employee_id;
      $attendences_this_month = DB::table('erp_employee_attendences')
                                ->whereMonth('date',date('n'))
                                ->where('employee_id','=',$employee_id)
                                ->count();

      $taskpending = DB::table('erp_tasks')
                    ->where('task_assigned_to', $employee_id)
                    ->where('task_status', 0)
                    ->count();

      return view('frontend.employee.addexpense',compact('employee','attendences_this_month','taskpending','announcements','countryList','locationList','current_option'));
    }

    public function employeeExpenseCreate(Request $request)
    {
      $employee_id = Auth::user()->employee_id;
      $employeeexpense = new ErpExpenses();
      $employeeexpense->expense_type      = $request->expense_type;
      $employeeexpense->expense_title     = $request->expense_title;
      $employeeexpense->expense_amount    = $request->expense_amount;
      $employeeexpense->expense_added_by  = $employee_id;
      $employeeexpense->expense_date      = $request->expense_date;
      $employeeexpense->save();
      return redirect('/employeeexpense');
    }


    public function employeeAccount()
    {

      $countryList = TourCountry::get();
      $locationList = TourLocation::get();
      $current_option = Options::get()->first();
      $announcements = ErpEmployeeAnnouncement::latest()->paginate(10);

      $employee = Auth::user();
      $employee_id    = Auth::user()->employee_id;

      $attendences_this_month = DB::table('erp_employee_attendences')
                                ->whereMonth('date',date('n'))
                                ->where('employee_id','=',$employee_id)
                                ->count();

      $taskpending = DB::table('erp_tasks')
                    ->where('task_assigned_to', $employee_id)
                    ->where('task_status', 0)
                    ->count();

      return view('frontend.employee.employeeaccount',compact('attendences_this_month','taskpending','announcements','employee','countryList','locationList','current_option'));
    }


    public function employeeAccountUpdate(Request $request)
    {

      if (!(Hash::check($request->get('currentpassword'), Auth::user()->password))) {
        return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
      }

      if(strcmp($request->get('currentpassword'), $request->get('newpassword')) == 0){
        return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
      }

       $this->validate($request, [
        'currentpassword' => 'required',
        'newpassword' => 'required|string|min:6|confirmed',
      ]);

      $user = Auth::user();
      $user->password = bcrypt($request->get('newpassword'));
      $user->save();
      return redirect()->back()->with("success","Password changed successfully !");

    }


}
