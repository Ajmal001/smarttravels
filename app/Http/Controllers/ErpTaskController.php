<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ErpTask;
use App\ErpCustomers;

use Session;
use DB;

class ErpTaskController extends Controller
{
    public function showTask(){
      $tasks =  ErpTask::all();
      $customers = ErpCustomers::all();
      return view('backend.erp.task.task', compact('tasks','customers'));
    }

    public function addTask(Request $request){
      $insert = new ErpTask();

  		$insert->task_title = $request->input('task_title');
  		$insert->task_date = $request->input('task_date');
  		$insert->task_assigned_to = $request->input('task_assigned_to');
  		$insert->task_status = 0;
  		$insert->task_details = $request->input('task_details');

  		$insert->save();
  		Session::flash('flash_message_insert', 'Task Added Successfully !');

  		return redirect('/adminerptask');
    }

    public function editTask($task_id){
       $taskdata = ErpTask::find($task_id);
       return response()->json(['taskdata' => $taskdata]);
    }

    public function updateTask(Request $request,$task_id){

        $update = ErpTask::find($task_id);

    		$update->task_title = $request->input('task_title');
    		$update->task_date = $request->input('task_date');
    		$update->task_assigned_to = $request->input('task_assigned_to');
    		$update->task_status = 0;
    		$update->task_details = $request->input('task_details');

    		$update->save();
    		Session::flash('flash_message_insert', 'Task Updated Successfully !');

    		return redirect('/adminerptask');
    }

    public function detailsTask($task_id){

        $taskDetails = ErpTask::find($task_id);
        return response()->json(['taskdetails' => $taskDetails]);

    }

    public function deleteTask(Request $request,$task_id){
      $task_id = $request->input('task_id');
      DB::table('erp_tasks')->where('task_id',$task_id)->delete();
      Session::flash('flash_message_delete', 'Task Deleted !');
      return redirect('/adminerptask');
    }


}
