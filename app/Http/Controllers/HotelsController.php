<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CountryRequest;
use App\Http\Requests\LocationRequest;
use App\Http\Requests\HotelFeatureRequest;
use App\Http\Requests\HotelRequest;

use App\Hotels;
use App\TourCountry;
use App\TourLocation;
use App\HotelFeatures;

use Illuminate\Support\MessageBag;

use Image;
use Session;
use DB;

class HotelsController extends Controller
{
    public function showHotels(){
		$hotelList = Hotels::get();
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$hotelFeatureList = HotelFeatures::get();
		return view('backend.website.website_hotels',compact('countryList','locationList','hotelFeatureList','hotelList'));
	}

	public function insertHotel(HotelRequest $request){
		$insert = new Hotels();
		$insert->service_type = "hotel";
		$insert->hotel_name = $request->input('hotel_name');
		$insert->hotel_sku = $request->input('hotel_sku');
		$insert->hotel_country = implode(',', $request->input('hotel_country'));
		$insert->hotel_location = implode(',', $request->input('hotel_location'));
		$insert->hotel_address = $request->input('hotel_address');
		$insert->hotel_price = $request->input('hotel_price');
		$insert->hotel_rating = $request->input('hotel_rating');
		$insert->hotel_features = implode(',', $request->input('hotel_features'));

		//Image

		if($request->hasFile('hotel_image')){
			$image = $request->file('hotel_image');
			$filename = time().'.'.$image->getClientOriginalExtension();
			Image::make($image)->resize(550,330)->save(public_path('/backendimages/'.$filename));
			$insert->hotel_image = $filename;
		}
		else{
			$filename = 'hotel_dafault.png';
			$insert->hotel_image = $filename;
		}

		$insert->hotel_details = $request->input('hotel_details');

		$insert->save();
		Session::flash('flash_message_insert', 'Hotel Added Successfully !');

		return redirect('/adminwebsitehotels');
	}


	public function insertCountry(CountryRequest $request){
	    $insert = new TourCountry();
		$insert->country_name = $request->input('country_name');
		Session::flash('flash_message_insert', 'Country Added Successfully !');
		$insert->save();
		return redirect('/adminwebsitehotels');
	}

	public function insertLocation(LocationRequest $request){
	    $insert = new TourLocation();
		$insert->country_id = $request->input('country_id');
		$insert->location_name = $request->input('location_name');
		Session::flash('flash_message_insert', 'Location Added Successfully !');
		$insert->save();
		return redirect('/adminwebsitehotels');
	}

	public function insertFeature(HotelFeatureRequest $request){
	    $insert = new HotelFeatures();
		$insert->features_name = $request->input('features_name');
		Session::flash('flash_message_insert', 'Features Added Successfully !');
		$insert->save();
		return redirect('/adminwebsitehotels');
	}

	public function showEditHotel($hotel_id){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$hotelFeatureList = HotelFeatures::get();
		$editHotel = Hotels::find($hotel_id);
		return view('backend.website.website_hotels_edit',compact('editHotel','countryList','locationList','hotelFeatureList'));
	}

	public function editHotel(Request $request){
		$hotel_id = $request->input('hotel_id');
		$edit = Hotels::find($hotel_id);
		$edit->hotel_name = $request->input('hotel_name');
		$edit->hotel_sku = $request->input('hotel_sku');
		$edit->hotel_country = implode(',', $request->input('hotel_country'));
		$edit->hotel_location = implode(',', $request->input('hotel_location'));
		$edit->hotel_address = $request->input('hotel_address');
		$edit->hotel_price = $request->input('hotel_price');
		$edit->hotel_rating = $request->input('hotel_rating');
		$edit->hotel_features = implode(',', $request->input('hotel_features'));

		//Image

		if($request->hasFile('hotel_image')){
			$image = $request->file('hotel_image');
			$filename = time().'.'.$image->getClientOriginalExtension();
			Image::make($image)->resize(550,330)->save(public_path('/backendimages/'.$filename));
			$edit->hotel_image = $filename;
		}
		else{
			$filename = $edit->hotel_image;
			$edit->hotel_image = $filename;
		}

		$edit->hotel_details = $request->input('hotel_details');

		$edit->save();
		Session::flash('flash_message_insert', 'Hotel Edited Successfully !');

		return redirect('/adminwebsitehotels');
	}

	public function deleteHotel($hotel_id){
		DB::table('travel_hotels')->where('hotel_id',$hotel_id)->delete();
        Session::flash('flash_message_delete', 'Hotel Deleted !');
		return redirect('/adminwebsitehotels');
	}


}
