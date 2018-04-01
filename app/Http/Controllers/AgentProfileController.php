<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TourCountry;
use App\TourLocation;
use App\Options;

use App\ErpEmployeeAnnouncement;
use App\ErpAgent;

use Auth;
use File;
use Carbon\Carbon;
use Image;
use Session;
use DB;

class AgentProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:agent');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.agent.home');
    }

    protected function guard()
    {
        return Auth::guard('agent');
    }

    public function agentHome()
    {
        $countryList = TourCountry::get();
        $locationList = TourLocation::get();
        $current_option = Options::get()->first();
        $announcements = ErpEmployeeAnnouncement::latest()->paginate(10);

        $agent = Auth::user();

        return view('frontend.agent.home',compact('agent','countryList','locationList','current_option','announcements'));
    }


    public function agentProfileEdit()
    {
        $countryList = TourCountry::get();
        $locationList = TourLocation::get();
        $current_option = Options::get()->first();
        $announcements = ErpEmployeeAnnouncement::latest()->paginate(10);

        $agent = Auth::user();

        return view('frontend.agent.editprofile',compact('announcements','agent','countryList','locationList','current_option'));
    }


    public function agentProfileUpdate(Request $request)
    {
        $id = $request->input('agent_id');

        $edit = ErpAgent::find($id);
        $edit->name = $request->input('name');
        $edit->agent_phone = $request->input('agent_phone');
        $edit->agent_area = $request->input('agent_area');

        // Image
        if($request->hasFile('agent_image')){
      			$image = $request->file('agent_image');
      			$filename = time().'.'.$image->getClientOriginalExtension();
      			Image::make($image)->resize(300,300)->save(public_path('/backendimages/'.$filename));
      			$edit->agent_image = $filename;
      		}
      		else{
      			$filename = $edit->agent_image;
      			$edit->agent_image = $filename;
      		}

        $edit->save();
        Session::flash('flash_message_update', 'Your Profile Updated Successfully !');
        return redirect('/agenthome');

    }


    public function agentAccount()
    {
        $countryList = TourCountry::get();
        $locationList = TourLocation::get();
        $current_option = Options::get()->first();
        $announcements = ErpEmployeeAnnouncement::latest()->paginate(10);
        $agent = Auth::user();

        return view('frontend.agent.agentaccount',compact('agent','announcements','countryList','locationList','current_option'));
    }

    public function agentAccountUpdate(Request $request)
    {
      $newpassword = $request->newpassword;
      $renewpassword = $request->renewpassword;

      $agent_id = Auth::user()->id;

      if($newpassword === $renewpassword){

        $password = ErpAgent::where('id',$agent_id)->update(['password'=>bcrypt($newpassword)]);

        Session::flash('flash_message_update', 'Password Updated Successfully.');
        return back();

      }else{
        Session::flash('flash_error_message', 'Password done not match !');
        return back();
      }
    }

    public function agentSale(){

      
    }


}
