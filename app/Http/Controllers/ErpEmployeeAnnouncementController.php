<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ErpEmployeeAnnouncement;

use Session;
use DB;

class ErpEmployeeAnnouncementController extends Controller
{
    public function showEmployeeAnnouncement(){
        $announcements =  ErpEmployeeAnnouncement::latest()->paginate(10);
        return view('backend.erp.announcements.announcement', compact('announcements'));
    }

    public function createEmployeeAnnouncement(Request $request){

        $insert = new ErpEmployeeAnnouncement();

        $insert->announcement_title = $request->input('announcement_title');
        $insert->announcement_execute_date = $request->input('announcement_execute_date');
        $insert->announcement_description = $request->input('announcement_description');

        $insert->save();
        Session::flash('flash_message_insert', 'Announcement Added Successfully !');

        return redirect('/adminerpemployeeannouncement');
    }

    public function editEmployeeAnnouncement($announcement_id){
        $announcementdata = ErpEmployeeAnnouncement::find($announcement_id);
        return response()->json(['announcementdata' => $announcementdata]);
    }

    public function updateEmployeeAnnouncement(Request $request,$announcement_id){

        $update = ErpEmployeeAnnouncement::find($announcement_id);

        $update->announcement_title = $request->input('announcement_title');
        $update->announcement_execute_date = $request->input('announcement_execute_date');
        $update->announcement_description = $request->input('announcement_description');

        $update->save();
        Session::flash('flash_message_insert', 'Announcement Updated Successfully !');

        return redirect('/adminerpemployeeannouncement');
    }

    public function viewEmployeeAnnouncement($id){

        $announcementDetails = ErpEmployeeAnnouncement::find($id);
        return response()->json(['announcementdetails' => $announcementDetails]);
    }

    public function deleteEmployeeAnnouncement(Request $request){

        $announcement_id = $request->input('announcement_id');
        ErpEmployeeAnnouncement::find($announcement_id)->delete();

        Session::flash('flash_message_delete', 'Announcement Deleted !');
        return redirect('/adminerpemployeeannouncement');
    }

}
