<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CountryRequest;
use App\Http\Requests\LocationRequest;
use App\Http\Requests\HotelFeatureRequest;
use App\Http\Requests\HotelRequest;
use App\Http\Requests\SightRequest;

use App\Hotels;
use App\TourCountry;
use App\TourLocation;
use App\HotelFeatures;
use App\Sights;

use Illuminate\Support\MessageBag;

use Image;
use Session;
use DB;

class SightController extends Controller
{
    public function showSigth(){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$sightList = Sights::get();
		return view('backend.website.website_sights',compact('countryList','locationList','sightList'));
	}
	
	public function insertSights(SightRequest $request){
		$insert = new Sights();
		$insert->service_type = "sight";
		$insert->sku = $request->input('sku');
		$insert->name = $request->input('name');
		$insert->country = implode(',', $request->input('country'));
		$insert->location = implode(',', $request->input('location'));
		
		//Image
		
		if($request->hasFile('image')){
			$image = $request->file('image');
			$filename = time().'.'.$image->getClientOriginalExtension();
			Image::make($image)->resize(550,330)->save(public_path('/backendimages/'.$filename));			
			$insert->image = $filename;
		}
		else{
			$filename = 'dafault.png';
			$insert->image = $filename;
		}	
		
		$insert->details = $request->input('details');
		$insert->save();
		Session::flash('flash_message_insert', 'Sights Added Successfully !');
		return redirect('/adminwebsitesights');
	}
	
	public function deleteSigth($sight_id){
		DB::table('sights')->where('sight_id',$sight_id)->delete();
        Session::flash('flash_message_delete', 'Sight Deleted !');		
		return redirect('/adminwebsitesights');
	}
	
	public function editSight($sight_id){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$editSight = Sights::find($sight_id);
		return view('backend.website.website_sight_edit',compact('countryList','locationList','editSight'));
	}
	
	public function editSightSave(Request $request){
		$sight_id = $request->input('sight_id');
		$edit = Sights::find($sight_id);
		$edit->name = $request->input('name');	
		$edit->sku = $request->input('sku');	
		$edit->country = implode(',', $request->input('country'));
		$edit->location = implode(',', $request->input('location'));
			
		//Image
		
		if($request->hasFile('image')){
			$image = $request->file('image');
			$filename = time().'.'.$image->getClientOriginalExtension();
			Image::make($image)->resize(550,330)->save(public_path('/backendimages/'.$filename));			
			$edit->image = $filename;
		}
		else{
			$filename = $edit->image;
			$edit->image = $filename;
		}	
			
		$edit->details = $request->input('details');
		$edit->save();
		Session::flash('flash_message_insert', 'Sights Edited Successfully !');
		return redirect('/adminwebsitesights');	
	}
}
