<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CountryRequest;
use App\Http\Requests\LocationRequest;
use App\Http\Requests\TourPackageRequest;
use App\Http\Requests\TourExinRequest;

use App\TourPackages;
use App\TourCountry;
use App\TourLocation;
use App\TourExIn;
use App\Booking;

use Illuminate\Support\MessageBag;

use Image;
use Session;
use DB;

class TourPackagesController extends Controller
{
	public function showTourPackages(){
		$tour_packages = TourPackages::orderBy('package_id', 'desc')->paginate(10);
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$exInList = TourExIn::get();
		return view('backend.website.website_tour_packages',compact('tour_packages','countryList','locationList','exInList'));
	}

	public function insertTourPackage(TourPackageRequest $request){
		$insert = new TourPackages();
		$insert->service_type = "tour";
		$insert->package_name = $request->input('package_name');
		$insert->package_sku = $request->input('package_sku');
		$insert->main_package = $request->input('main_package');
		$insert->general_package = $request->input('general_package');
		$insert->country = implode(',', $request->input('country'));
		$insert->location = implode(',', $request->input('location'));
		$insert->price = $request->input('price');
		$insert->duration = $request->input('duration');
		$insert->tour_exclude = implode(',', $request->input('tour_exclude'));
		$insert->tour_include = implode(',', $request->input('tour_include'));
		$insert->arrival_date = $request->input('arrival_date');
		$insert->departure_date = $request->input('departure_date');

		//Image

		if($request->hasFile('tour_image')){
			$image = $request->file('tour_image');
			$filename = time().'.'.$image->getClientOriginalExtension();
			Image::make($image)->resize(1450,700)->save(public_path('/backendimages/'.$filename));
			$insert->tour_image = $filename;
		}
		else{
			$filename = 'tour_dafault.png';
			$insert->tour_image = $filename;
		}

		$insert->tour_details = $request->input('tour_details');

		$insert->save();
		Session::flash('flash_message_insert', 'Package Added Successfully !');
		$tour_packages = TourPackages::get();
		return redirect('/adminwebsitetourpackages');

	}

	public function viewTourPackage($package_id){
		$viewPackage 		= TourPackages::find($package_id);

		return response()->json([
			'viewpackage' 	=> $viewPackage
		]);
	}

	public function editTourPackage($package_id){
		$editPackage 		= TourPackages::find($package_id);
		$countryName 		= TourCountry::pluck('country_name');
		$exInList 			= TourExIn::pluck('exin_name');

		return response()->json([
			'editpackage' 	=> $editPackage,
			'countryName' 	=> $countryName,
			'exinlist'	  	=> $exInList
		]);
	}
	public function getLocationsByMultipleCountry(Request $request){
		$countryname = $request->input('countryname');
		$countrynamearr = explode(',', $countryname);
		$country = [];
		foreach ($countrynamearr as $countryname) {
			$countryid = TourCountry::where('country_name', $countryname)->pluck('country_id');
			$country[] = TourLocation::where('country_id', $countryid)->pluck('location_name');
		}
		return $country;
	}

	public function editTourPackageSave(Request $request){
		$package_id = $request->input('package_id');
		$edit = TourPackages::find($package_id);
		$edit->package_name = $request->input('package_name');
		$edit->package_sku = $request->input('package_sku');
		$edit->main_package = $request->input('main_package');
		$edit->general_package = $request->input('general_package');
		$edit->country = implode(',', $request->input('country'));
		$edit->location = implode(',', $request->input('location'));
		$edit->price = $request->input('price');
		$edit->duration = $request->input('duration');
		$edit->tour_exclude = implode(',', $request->input('tour_exclude'));
		$edit->tour_include = implode(',', $request->input('tour_include'));
		$edit->arrival_date = $request->input('arrival_date');
		$edit->departure_date = $request->input('departure_date');

		//Image

		if($request->hasFile('tour_image')){
			$image = $request->file('tour_image');
			$filename = time().'.'.$image->getClientOriginalExtension();
			Image::make($image)->resize(1450,700)->save(public_path('/backendimages/'.$filename));
			$edit->tour_image = $filename;
		}
		else{
			$filename = $edit->tour_image;
			$edit->tour_image = $filename;
		}

		$edit->tour_details = $request->input('tour_details');

		$edit->save();
		Session::flash('flash_message_insert', 'Package Edited Successfully !');
		return redirect('/adminwebsitetourpackages');
	}

	public function deleteTourPackage(Request $request){
		$package_id = $request->input('package_id');
		TourPackages::find($package_id)->delete();
        Session::flash('flash_message_delete', 'Package Deleted !');
		return redirect('/adminwebsitetourpackages');
	}

	public function insertCountry(CountryRequest $request){
	    $insert = new TourCountry();
		$insert->country_name = $request->input('country_name');
		Session::flash('flash_message_insert', 'Country Added Successfully !');
		$insert->save();
		return redirect()->back();
	}

	public function insertLocation(LocationRequest $request){
	    $insert = new TourLocation();
		$insert->country_id = $request->input('country_id');
		$insert->location_name = $request->input('location_name');
		Session::flash('flash_message_insert', 'Location Added Successfully !');
		$insert->save();
		return redirect()->back();
	}

	public function insertExIn(TourExinRequest $request){
		$insert = new TourExIn();
		$insert->exin_name = $request->input('exin_name');
		Session::flash('flash_message_insert', 'Tour Feature Added Successfully !');
		$insert->save();
		return redirect('/adminwebsitetourpackages');
	}


}
