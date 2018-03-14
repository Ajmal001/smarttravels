<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ErpEmployeeAttendence;
use App\ErpEmployee;

class ErpEmployeeAttendenceController extends Controller
{
    public function showEmployeeAttendence()
    {
      $allattendence = ErpEmployeeAttendence::with('employee')->latest()->paginate(10);
      $allemployee = ErpEmployee::all();
      return view( 'backend.erp.attendence.attendence', compact('allattendence','allemployee') );
    }

    public function createEmployeeAttendence(Request $request)
    {

      $insert = new ErpEmployeeAttendence();

      $insert->employee_id = $request->employee_id;
      $insert->date = $request->date;
      $insert->in_time = $request->in_time;
      $insert->out_time = $request->out_time;
      $insert->note = $request->note;

      $insert->save();

      return back();

    }


    public function editEmployeeAttendence($id)
    {
      $attendence = ErpEmployeeAttendence::find($id);

      return response()->json(['attendencedata' => $attendence]);
    }


    public function updateEmployeeAttendence(Request $request, $id)
    {

      $update = ErpEmployeeAttendence::find($id);

      $update->employee_id = $request->employee_id;
      $update->date = $request->date;
      $update->in_time = $request->in_time;
      $update->out_time = $request->out_time;
      $update->note = $request->note;

      $update->save();
      return back();
    }

    public function deleteEmployeeAttendence(Request $request)
    {
      $attendence_id = $request->attendence_id;
      $attendence = ErpEmployeeAttendence::find($attendence_id);
      $attendence->delete();

      return back();
    }
}
