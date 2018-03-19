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
use App\Attractions;

use Illuminate\Support\MessageBag;

use Image;
use Session;
use DB;

class AttractionsController extends Controller
{
	   public function showAttractions(){
		   $countryList = TourCountry::get();
		   $locationList = TourLocation::get();
		   $attractionList = Attractions::latest()->paginate(10);
		   return view('backend.website.website_attractions',compact('countryList','locationList','attractionList'));
	   }

	   public function insertAttractions(Request $request){
		   $insert = new Attractions();
		   $insert->service_type = "attractions";
		   $insert->name = $request->input('name');
		   $insert->sku = $request->input('sku');
		   $insert->price = $request->input('price');
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
		   Session::flash('flash_message_insert', 'Attractions Added Successfully !');
		   return redirect('/adminwebsiteattractions');

	    }

	    public function deleteAttractions($id){
		   DB::table('travel_attractions')->where('id',$id)->delete();
		   Session::flash('flash_message_delete', 'Attractions Deleted !');
		   return redirect('/adminwebsiteattractions');
	    }

		public function editAttractions($id){
		   $countryList = TourCountry::get();
		   $locationList = TourLocation::get();
		   $attraction = Attractions::find($id);
		   return view('backend.website.website_attraction_edit',compact('countryList','locationList','attraction'));
		}

		public function editAttractionsSave(Request $request){
		   $id = $request->input('id');
		   $edit = Attractions::find($id);
		   $edit->name = $request->input('name');
		   $edit->sku = $request->input('sku');
		   $edit->price = $request->input('price');
		   $edit->country = implode(',', $request->input('country'));
		   $edit->location = implode(',', $request->input('location'));

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
		   Session::flash('flash_message_insert', 'Attractions Edited Successfully !');
		   return redirect('/adminwebsiteattractions');
		}
}
