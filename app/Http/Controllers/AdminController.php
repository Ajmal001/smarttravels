<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TourPackages;
use App\Hotels;
use App\Sights;
use App\Visa;
use App\ErpCustomers;
use App\ErpEmployee;
use App\ErpSales;
use App\TourCountry;
use App\TourLocation;
use App\ErpTask;
use App\EmployeeLogin;
use App\OptionsImage;
use App\OptionsCurrency;

use Carbon\Carbon;
use Auth;
use Hash;

use App\Options;
use Session;
use Image;
use DB;

class AdminController extends Controller
{

  public function adminDashboard(){
    $tasks      = ErpTask::latest()->take(10)->get();
    $employees  = EmployeeLogin::all();
    $sales      = ErpSales::latest()->take(10)->get();

    $today = Carbon::now();
    $this_month = Carbon::now()->subMonth();
    $optionscurrency = OptionsCurrency::where('selected',1)->first(['currency']);

    $totalTourPackages = TourPackages::get()->count();
    $totalHotels = Hotels::get()->count();
    $totalSightSeeing = Sights::get()->count();
    $totalVisaApply = Visa::get()->count();

    $totalCustomers = ErpCustomers::get()->count();
    $totalEmployees = ErpEmployee::get()->count();

    $sale_total_month = DB::table('erp_sales')
            ->where('payment_type', 'cash')
            ->where('sales_date', '>=', $this_month)
            ->sum('sales_price');

    $expense_total_month = DB::table('erp_expenses')
            ->where('expense_date', '>=', $this_month)
            ->sum('expense_amount');

    $current_option = Options::get()->first();

    return view('backend.dashboard',compact('expense_total_month','sale_total_month','totalEmployees','totalCustomers','totalVisaApply','totalSightSeeing','totalHotels','totalTourPackages','tasks','employees','sales','today','optionscurrency','current_option'));
	}

	public function adminWebsitePages(){
		return view('backend.website.website_pages');
	}

	public function adminWebsiteHome(){
		return view('backend.website.website_home');
	}

	public function adminLogin(){
		return view('backend.authentication.login');
	}

	public function logoOptions(){
		$current_option= Options::get()->first();
		return view('backend.website.options.logo',compact('current_option'));
	}

	public function logoOptionsSave(Request $request){
		$option_id = 1;
		$insert = Options::find($option_id);

		if($request->hasFile('logo')){
			$image = $request->file('logo');
			$filename = time().'.'.$image->getClientOriginalExtension();
			Image::make($image)->resize(145,131)->save(public_path('/backendimages/'.$filename));
			$insert->logo = $filename;
		}
		else{
			$filename = $insert->logo;
			$insert->logo = $filename;
		}

		$insert->save();
		Session::flash('flash_message_insert', 'Logo Updated Successfully !');
		return redirect()->back();
	}

	public function faviconOptions(){
		$current_option= Options::get()->first();
		return view('backend.website.options.favicon',compact('current_option'));
	}

	public function faviconOptionsSave(Request $request){
		$option_id = 1;
		$insert = Options::find($option_id);

		if($request->hasFile('favicon')){
			$image = $request->file('favicon');
			$filename = time().'.'.$image->getClientOriginalExtension();
			Image::make($image)->resize(32,32)->save(public_path('/backendimages/'.$filename));
			$insert->favicon = $filename;
		}
		else{
			$filename = $insert->favicon;
			$insert->favicon = $filename;
		}

		$insert->save();
		Session::flash('flash_message_insert', 'Favicon Updated Successfully !');
		return redirect()->back();
	}

	public function emailOptions(){
		$current_option= Options::get()->first();
		return view('backend.website.options.email',compact('current_option'));
	}

	public function emailOptionsSave(Request $request){
		$option_id = 1;
		$insert = Options::find($option_id);
		$insert->email = $request->input('email');

		$insert->save();
		Session::flash('flash_message_insert', 'Email Updated Successfully !');
		return redirect()->back();
	}

	public function addressOptions(){
		$current_option= Options::get()->first();
		return view('backend.website.options.address',compact('current_option'));
	}

	public function addressOptionsSave(Request $request){
		$option_id = 1;
		$insert = Options::find($option_id);
		$insert->address = $request->input('address');

		$insert->save();
		Session::flash('flash_message_insert', 'Address Updated Successfully !');
		return redirect()->back();
	}

	public function mobileOptions(){
		$current_option= Options::get()->first();
		return view('backend.website.options.mobile',compact('current_option'));
	}

	public function mobileOptionsSave(Request $request){
		$option_id = 1;
		$insert = Options::find($option_id);
		$insert->mobile = $request->input('mobile');

		$insert->save();
		Session::flash('flash_message_insert', 'Mobile Updated Successfully !');
		return redirect()->back();
	}

	public function copyrightOptions(){
		$current_option= Options::get()->first();
		return view('backend.website.options.copyright',compact('current_option'));
	}

	public function copyrightOptionsSave(Request $request){
		$option_id = 1;
		$insert = Options::find($option_id);
		$insert->copyright = $request->input('copyright');

		$insert->save();
		Session::flash('flash_message_insert', 'Copyright Updated Successfully !');
		return redirect()->back();
	}

	public function socialOptions(){
		$current_option= Options::get()->first();
		return view('backend.website.options.social',compact('current_option'));
	}

	public function socialOptionsSave(Request $request){
		$option_id = 1;
		$insert = Options::find($option_id);

		$insert->social_facebook = $request->input('social_facebook');
		$insert->social_twitter = $request->input('social_twitter');
		$insert->social_google = $request->input('social_google');
		$insert->social_linkedin = $request->input('social_linkedin');
		$insert->social_youtube = $request->input('social_youtube');

		$insert->save();
		Session::flash('flash_message_insert', 'Social Updated Successfully !');
		return redirect()->back();
	}

	public function adminCountry(){
		$countries = TourCountry::latest()->paginate(10);

		return view('backend.website.country_location.country',compact('countries'));
	}

	public function editCountry($id){
		$country = TourCountry::find($id);
		return response()->json(['country'=>$country]);
	}

	public function updateCountry(Request $request,$id){
		$country = TourCountry::find($id);
		$country->country_name = $request->country_name;
		$country->save();
		return back();
	}

	public function deleteCountry(Request $request){
		$country_id = $request->input('country_id');
		$country = TourCountry::find($country_id);
		$country->locations()->delete();
		$country->delete();
        Session::flash('flash_message_delete', 'Country Deleted !');
		return back();
	}

	public function adminLocation(){
		$locations = TourLocation::latest()->paginate(10);
		$countryList = TourCountry::get();

		return view('backend.website.country_location.location',compact('locations','countryList'));
	}

	public function editLocation($id){
		$location = TourLocation::find($id);
		return response()->json(['location'=>$location]);
	}

	public function updateLocation(Request $request,$id){
		$location = TourLocation::find($id);
		$location->country_id = $request->country_id;
		$location->location_name = $request->location_name;
		$location->save();
		return back();
	}

	public function deleteLocation(Request $request){
		$location_id = $request->input('location_id');
		TourLocation::find($location_id)->delete();
        Session::flash('flash_message_delete', 'Location Deleted !');
		return redirect()->back();
	}

  // Month Expense and Income
  public function adminMonthlyExpanse(){

    $expenses = array();
    $incomes  = array();
    for ($i=1; $i <= 12; $i++) {
      $expenses[] = DB::table("erp_expenses")->whereMonth('expense_date', '=', $i)->sum('expense_amount');
      $incomes[]  = DB::table("erp_sales")->whereMonth('sales_date', '=', $i)->sum('sales_price');
    }

    return response()->json([
      'expenses'  => $expenses,
      'incomes'   => $incomes
    ]);

  }

  // Weekly Expense and Income
  public function adminWeeklyExpanse(){

    $start = Carbon::now()->subWeeks(1);
    $end   = Carbon::now()->subDays(1);
    $days  = $start->diff($end)->days;

    $expenses = array();
    $incomes  = array();
    $daysname = array();
    $daysweek = array();

    for ($i = 0; $i <= $days; $i++) {
        $date       = '';
        $date       = $start->addDays(1);
        $daysname[] = $date->format('D');
        $daysweek[] = $date->format('Y-m-j');
    }

    foreach ($daysweek as $day) {
      $expenses[] = DB::table("erp_expenses")->whereDate('expense_date', '=', $day)->sum('expense_amount');
      $incomes[]  = DB::table("erp_sales")->whereDate('sales_date', '=', $day)->sum('sales_price');
    }

    return response()->json([
      'expenses'  => $expenses,
      'incomes'   => $incomes,
      'sevendays' => $daysname
    ]);

  }

  // Monthly Sales
  public function adminMonthlySales(){

    $start = Carbon::now()->startOfMonth();
    $end   = Carbon::now();
    $days  = $start->diff($end)->days;

    $incomes  = array();
    $dayssell = array();

    for ($i = 0; $i <= $days; $i++) {
        $date       = $start;
        $dayssell[] = $date->format('Y-m-j');
        $date       = $start->addDays(1);
    }

    foreach ($dayssell as $day) {
      $incomes[]  = DB::table("erp_sales")->whereDate('sales_date', '=', $day)->sum('sales_price');
    }

    return response()->json([
      'incomes'     => $incomes,
      'daysofmonth' => $dayssell
    ]);

  }


  // Page Banner Options

  public function pageBanner()
  {
    $pagebanners = OptionsImage::where('image_id',1)->get();

    if( $pagebanners->isEmpty() ){
      $insert = new OptionsImage();
      $insert->save();
    }

    return view('backend.website.options.pagebanner', compact('pagebanners'));

  }

  public function pageBannerUpdate(Request $request)
  {
    $update = OptionsImage::find(1);

    if($request->hasFile('image_home')){
      $image = $request->file('image_home');
      $filename = 'home'.time().'.'.$image->getClientOriginalExtension();

      $request->image_home->move(public_path('backendimages'), $filename);

      $update->image_home = $filename;

    }

    if($request->hasFile('image_package')){
      $image = $request->file('image_package');
      $filename = 'package'.time().'.'.$image->getClientOriginalExtension();

      $request->image_package->move(public_path('backendimages'), $filename);

      $update->image_package = $filename;
    }
    $update->package_heading = $request->package_heading;
    $update->package_description = $request->package_description;


    if($request->hasFile('image_hotel')){
      $image = $request->file('image_hotel');
      $filename = 'hotel'.time().'.'.$image->getClientOriginalExtension();

      $request->image_hotel->move(public_path('backendimages'), $filename);

      $update->image_hotel = $filename;
    }
    $update->hotel_heading = $request->hotel_heading;
    $update->hotel_description = $request->hotel_description;


    if($request->hasFile('image_sight')){
      $image = $request->file('image_sight');
      $filename = 'sight'.time().'.'.$image->getClientOriginalExtension();

      $request->image_sight->move(public_path('backendimages'), $filename);

      $update->image_sight = $filename;
    }
    $update->sight_heading = $request->sight_heading;
    $update->sight_description = $request->sight_description;


    if($request->hasFile('image_attraction')){
      $image = $request->file('image_attraction');
      $filename = 'attraction'.time().'.'.$image->getClientOriginalExtension();

      $request->image_attraction->move(public_path('backendimages'), $filename);

      $update->image_attraction = $filename;
    }
    $update->attraction_heading = $request->attraction_heading;
    $update->attraction_description = $request->attraction_description;


    $update->save();

    return redirect('adminwebsiteoptionspagebanner');
  }


  // Currency
  public function optionsCurrency()
  {
    $optionscurrency = OptionsCurrency::paginate(10);
    return view('backend.website.options.currency', compact('optionscurrency'));
  }

  public function optionsCurrencyAdd(Request $request)
  {
    OptionsCurrency::create($request->all());
    return redirect('/adminwebsiteoptionscurrency');
  }

  public function optionsCurrencyUpdate(Request $request)
  {
    $id = $request->currency_id;
    $update = OptionsCurrency::find($id)->update(['selected'=>1]);
    $update = OptionsCurrency::whereNotIn('id',[$id])->update(['selected'=>0]);

    return redirect('/adminwebsiteoptionscurrency');
  }

  public function optionsCurrencyDelete(Request $request){
    $id = $request->id;
    OptionsCurrency::find($id)->delete();
    return redirect('/adminwebsiteoptionscurrency');
  }

  // Profile and Password Settings
  public function adminProfileSettings()
  {
    $admin = Auth::user();
    return view('backend.website.website_admin_profile',compact('admin'));
  }

  // Profile
  public function adminProfileSettingsEdit()
  {
    $admin = Auth::user();
    return view('backend.website.website_admin_profileedit',compact('admin'));
  }

  public function adminProfileSettingsUpdate(Request $request)
  {
    $admin = Auth::user();
    $admin->update([
      'name'  => $request->name,
      'email' => $request->email
    ]);
    return back();
  }

  // Password
  public function adminPasswordSettingsEdit()
  {
    $admin = Auth::user();
    return view('backend.website.website_admin_passwordedit',compact('admin'));
  }

  public function adminPasswordSettingsUpdate(Request $request)
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
