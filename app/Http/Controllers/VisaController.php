<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VisaRequirementRequest;
use App\TourCountry;
use App\TourLocation;
use App\Visa;
use App\VisaApplication;

use Session;
use DB;

class VisaController extends Controller
{
    public function visaRequirements(){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();

		$visaRequirementsList = Visa::latest()->paginate(10);
		return view('backend.website.website_visa_requirements',compact('countryList','locationList','visaRequirementsList'));
	}

	public function visaRequirementsSave(VisaRequirementRequest $request){
		$insert = new Visa();
		$insert->country = $request->input('country');
		$insert->requirements = $request->input('requirements');

		$insert->save();
		Session::flash('flash_message_insert', 'Visa Requirements Added Successfully !');

		return redirect('/adminwebsitevisarequirements');
	}

	public function visaRequirementsEdit($id){
		$editVisa = Visa::find($id);
		return response()->json(['editvisareq'=>$editVisa]);
	}

	public function visaRequirementsView($id){
		$viewVisa = Visa::find($id);
		return response()->json(['viewvisareq'=>$viewVisa]);
	}

	public function visaRequirementsEditSave(Request $request){
		$id = $request->input('id');
		$edit = Visa::find($id);
		$edit->country = $request->input('country');
		$edit->requirements = $request->input('requirements');

		$edit->save();
		Session::flash('flash_message_insert', 'Visa Requirements Edited Successfully !');

		return redirect('/adminwebsitevisarequirements');
	}

	public function visaRequirementsDelete(Request $request){
		$id = $request->input('id');
		Visa::find($id)->delete();
        Session::flash('flash_message_delete', 'Requirements Deleted !');
		return redirect('/adminwebsitevisarequirements');
	}

	 public function bookingVisa(){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();

		$visaBooingList = VisaApplication::latest()->paginate(10);
		return view('backend.website.website_booking_visa',compact('countryList','locationList','visaBooingList'));
	}

	public function bookingVisaDelete($id){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();

		DB::table('travel_visa_applications')->where('id',$id)->delete();
        Session::flash('flash_message_delete', 'Visa Booking Deleted !');
		return redirect('/adminwebsitevisabooking');


	}

}
