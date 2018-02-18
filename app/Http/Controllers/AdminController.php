<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TourPackages;
use App\Options;
use Session;
use Image;
use DB;

use App\TourCountry;
use App\TourLocation;

class AdminController extends Controller
{
    public function adminDashboard(){
		return view('backend.dashboard');
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
		$countries = TourCountry::get();
		
		return view('backend.website.country_location.country',compact('countries'));	
	}
	
	public function deleteCountry($country_id){
		DB::table('tour_country')->where('country_id',$country_id)->delete();
        Session::flash('flash_message_delete', 'Country Deleted !');		
		return redirect()->back();
	}

	public function adminLocation(){
		$locations = TourLocation::get();
		$countryList = TourCountry::get();
		
		return view('backend.website.country_location.location',compact('locations','countryList'));	
	}
	
	public function deleteLocation($location_id){
		DB::table('tour_location')->where('location_id',$location_id)->delete();
        Session::flash('flash_message_delete', 'Location Deleted !');		
		return redirect()->back();
	}	
		
}
