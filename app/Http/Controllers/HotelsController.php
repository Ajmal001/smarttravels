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
use App\OptionsCurrency;

use Illuminate\Support\MessageBag;

use Image;
use Session;
use DB;

class HotelsController extends Controller
{
    public function showHotels(){
		$hotelList = Hotels::latest()->paginate(10);
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$hotelFeatureList = HotelFeatures::get();
		$optionscurrency = OptionsCurrency::where('selected',1)->first(['currency']);
		return view('backend.website.website_hotels',compact('countryList','optionscurrency','locationList','hotelFeatureList','hotelList'));
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
		// return redirect('/adminwebsitehotels');
    return back();
	}

	public function insertLocation(LocationRequest $request){
	    $insert = new TourLocation();
		$insert->country_id = $request->input('country_id');
		$insert->location_name = $request->input('location_name');
		Session::flash('flash_message_insert', 'Location Added Successfully !');
		$insert->save();
		// return redirect('/adminwebsitehotels');
    return back();
	}

	public function insertFeature(HotelFeatureRequest $request){
	    $insert = new HotelFeatures();
		$insert->features_name = $request->input('features_name');
		Session::flash('flash_message_insert', 'Features Added Successfully !');
		$insert->save();
		return redirect('/adminwebsitehotels');
	}

	public function viewHotel($hotel_id){

		$viewHotel = Hotels::find($hotel_id);

		return response()->json(['viewhotel'=>$viewHotel]);
	}

	public function showEditHotel($hotel_id){

		$editHotel 	 	= Hotels::find($hotel_id);
		$countryName 	= TourCountry::pluck('country_name');
		$hotelFeatured 	= HotelFeatures::pluck('features_name');

		return response()->json([
			'edithotel' 		=> $editHotel,
			'countryName'		=> $countryName,
			'hotelFeaturedList' => $hotelFeatured
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

	public function deleteHotel(Request $request){
		$hotel_id = $request->input('hotel_id');
		Hotels::find($hotel_id)->delete();
        Session::flash('flash_message_delete', 'Hotel Deleted !');
		return redirect('/adminwebsitehotels');
	}


}
