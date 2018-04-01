<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TourCountry;
use App\TourLocation;
use App\Options;

use App\ErpEmployeeAnnouncement;
use App\ErpAgent;
use App\ErpCustomers;
use App\OptionsCurrency;
use App\ErpSales;

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


    public function agentSales()
    {
      $countryList = TourCountry::get();
      $locationList = TourLocation::get();
      $current_option = Options::get()->first();
      $agent = Auth::user();
      $agentid = Auth::user()->id;
      $announcements = ErpEmployeeAnnouncement::latest()->paginate(10);
      $optionscurrency = OptionsCurrency::where('selected',1)->first(['currency']);
      $sales = ErpSales::with('customer')->where('sales_by_id',$agentid)->where('sales_by_type','Agent')->latest()->paginate(10);

      return view('frontend.agent.agentsaleslist',compact('sales','agent','announcements','optionscurrency','countryList','locationList','current_option'));
    }

    public function agentSalesEdit()
    {
        $countryList = TourCountry::get();
        $locationList = TourLocation::get();
        $current_option = Options::get()->first();
        $announcements = ErpEmployeeAnnouncement::latest()->paginate(10);
        $customers = ErpCustomers::all();
        $agent = Auth::user();

        return view('frontend.agent.agentsales',compact('customers','agent','announcements','countryList','locationList','current_option'));
    }

    public function agentSalesAdd(Request $request)
    {
        $insert = new ErpSales();
        $insert->sales_item_type = $request->sales_item_type;
        $insert->sales_item_name = $request->sales_item_name;
        $insert->sales_sku = $request->sales_sku;
        $insert->sales_customer_id = $request->sales_customer_id;
        $insert->sales_by_type = $request->sales_by_type;
        $insert->sales_by_id = $request->sales_by_id;
        $insert->payment_type = $request->payment_type;
        $insert->payment_method = $request->payment_method;
        $insert->payment_info = $request->payment_info;
        $insert->sales_price = $request->sales_price;
        $insert->sales_date = $request->sales_date;
        $insert->sales_customer_rating = $request->sales_customer_rating;
        $insert->save();
        return redirect('/agentsales');
    }


}
