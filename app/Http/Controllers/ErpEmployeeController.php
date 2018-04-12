<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ErpEmployee;

use DB;
use Session;

class ErpEmployeeController extends Controller
{
  public function showEmployee()
  {
    $allemployee = ErpEmployee::latest()->paginate(10);

    return view( 'backend.erp.employee.employee', compact('allemployee') );
  }


  public function viewEmployee($id)
  {
    $employee = ErpEmployee::find($id);

    return response()->json( ['employeedata' => $employee] );
  }

  public function createEmployee(Request $request)
  {

    $insert = new ErpEmployee();

    $insert->employee_name = $request->employee_name;
    $insert->email = $request->email;
    $insert->employee_phone = $request->employee_phone;
    $insert->password  = $request->password;
    $insert->status  = $request->status;
    $insert->employee_address = $request->employee_address;
    $insert->employee_nid = $request->employee_nid;
    $insert->employee_designation = $request->employee_designation;

    //Image
    if($request->hasFile('employee_image')){
      $image = $request->file('employee_image');
      $filename = time().'.'.$image->getClientOriginalExtension();
      $request->employee_image->move(public_path('backendimages'), $filename);

      $insert->employee_image = $filename;
    }
    else{
      $filename = 'employee_dafault.png';
      $insert->employee_image = $filename;
    }

    $insert->save();

    return back();
  }


  public function editEmployee($id)
  {
    $employee = ErpEmployee::find($id);

    return response()->json( ['employeedata' => $employee] );
  }


  public function updateEmployee(Request $request, $id)
  {

    $update = ErpEmployee::find($id);

    $update->employee_name = $request->employee_name;
    $update->email = $request->email;
    $update->employee_phone = $request->employee_phone;
    $update->employee_address = $request->employee_address;
    $update->employee_nid = $request->employee_nid;
    $update->employee_designation = $request->employee_designation;
    $update->status = $request->status;

    //Image
    if($request->hasFile('employee_image')){
      $image = $request->file('employee_image');
      $filename = time().'.'.$image->getClientOriginalExtension();
      $request->employee_image->move(public_path('backendimages'), $filename);

      $update->employee_image = $filename;
    }
    else{
      $filename = 'employee_dafault.png';
      $update->employee_image = $filename;
    }

    $update->save();

    return back();
  }

  public function deleteEmployee(Request $request, $id)
  {
    $employee_id = $request->input('employee_id');
    DB::table('erp_employees_info')->where('employee_id',$employee_id)->delete();
    Session::flash('flash_message_delete', 'Employee Deleted !');
    return redirect('/adminerpemployee');
  }
}
