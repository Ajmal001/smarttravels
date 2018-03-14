<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Operator\AirTicket;
use App\Models\Operator\Food;
use App\Models\Operator\Hotel;
use App\Models\Operator\PicDrop;
use App\Models\Operator\Sight;
use App\Models\Operator\Location;

use App\TourCountry;
use App\TourLocation;

use Illuminate\Support\MessageBag;

use Image;
use Session;
use DB;

class OperatorController extends Controller
{
	// Location
    public function OperatorLocation(){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$operatorLocation = Location::latest()->paginate(10);

		return view('backend.website.operator.operator_location',compact('countryList','locationList','operatorLocation'));
	}

	public function OperatorLocationSave(Request $request){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();

		$insert = new Location();
		$insert->country = $request->input('country');
		$insert->location = $request->input('location');
		$insert->price = $request->input('price');

		$insert->save();
		Session::flash('flash_message_insert', 'Location Price Added Successfully !');

		return redirect('/adminwebsiteoperatorlocation');
	}

	public function OperatorLocationDelete($id){
		DB::table('operator_location')->where('id',$id)->delete();
        Session::flash('flash_message_delete', 'Location Price Deleted !');
		return redirect('/adminwebsiteoperatorlocation');
	}

    // Hotel
    public function OperatorHotel(){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$operatorHotel = Hotel::latest()->paginate(10);

		return view('backend.website.operator.operator_hotel',compact('countryList','locationList','operatorHotel'));
	}

	public function OperatorHotelSave(Request $request){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();

		$insert = new Hotel();
		$insert->country = $request->input('country');
		$insert->location = $request->input('location');
		$insert->rating = $request->input('rating');
		$insert->price = $request->input('price');

		$insert->save();
		Session::flash('flash_message_insert', 'Hotel Price Added Successfully !');

		return redirect('/adminwebsiteoperatorhotel');
	}

	public function OperatorHotelDelete($id){
		DB::table('operator_hotel')->where('id',$id)->delete();
        Session::flash('flash_message_delete', 'Hotel Price Deleted !');
		return redirect('/adminwebsiteoperatorhotel');
	}
	// Pic & Drop
	public function OperatorPicDrop(){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$operatorPicDrop = PicDrop::latest()->paginate(10);

		return view('backend.website.operator.operator_pic_drop',compact('countryList','locationList','operatorPicDrop'));
	}

	public function OperatorPicDropSave(Request $request){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();

		$insert = new PicDrop();
		$insert->country = $request->input('country');
		$insert->location = $request->input('location');
		$insert->price = $request->input('price');

		$insert->save();
		Session::flash('flash_message_insert', 'Pic & Drop Price Added Successfully !');

		return redirect('/adminwebsiteoperatorpicdrop');
	}

	public function OperatorPicDropDelete($id){
		DB::table('operator_pic_drop')->where('id',$id)->delete();
        Session::flash('flash_message_delete', 'Pic & Drop Deleted !');
		return redirect('/adminwebsiteoperatorpicdrop');
	}

	// Food
	public function OperatorFood(){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$operatorFood = Food::latest()->paginate(10);

		return view('backend.website.operator.operator_food',compact('countryList','locationList','operatorFood'));
	}

	public function OperatorFoodSave(Request $request){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();

		$insert = new Food();
		$insert->country = $request->input('country');
		$insert->type = $request->input('type');
		$insert->price = $request->input('price');

		$insert->save();
		Session::flash('flash_message_insert', 'Food Price Added Successfully !');

		return redirect('/adminwebsiteoperatorfood');
	}

	public function OperatorFoodDelete($id){
		DB::table('operator_food')->where('id',$id)->delete();
        Session::flash('flash_message_delete', 'Food Price Deleted !');
		return redirect('/adminwebsiteoperatorfood');
	}

	// Air Ticket
	public function OperatorAirTicket(){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$operatorAirTicket = AirTicket::latest()->paginate(10);

		return view('backend.website.operator.operator_air_ticket',compact('countryList','locationList','operatorAirTicket'));
	}

	public function OperatorAirTicketSave(Request $request){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();

		$insert = new AirTicket();
		$insert->country = $request->input('country');
		$insert->location = $request->input('location');
		$insert->type = $request->input('type');
		$insert->price = $request->input('price');

		$insert->save();
		Session::flash('flash_message_insert', 'AirTicket Price Added Successfully !');

		return redirect('/adminwebsiteoperatorairticket');
	}

	public function OperatorAirTicketDelete($id){
		DB::table('operator_air_ticket')->where('id',$id)->delete();
        Session::flash('flash_message_delete', 'Sight Price Deleted !');
		return redirect('/adminwebsiteoperatorairticket');
	}

	// Sight
	public function OperatorSight(){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$operatorSight = Sight::latest()->paginate(10);

		return view('backend.website.operator.operator_sight',compact('countryList','locationList','operatorSight'));
	}

	public function OperatorSightSave(Request $request){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();

		$insert = new Sight();
		$insert->country = $request->input('country');
		$insert->location = $request->input('location');
		$insert->name = $request->input('name');
		$insert->price = $request->input('price');

		$insert->save();
		Session::flash('flash_message_insert', 'Sight Price Added Successfully !');

		return redirect('/adminwebsiteoperatorsight');
	}

	public function OperatorSightDelete($id){
		DB::table('operator_sight')->where('id',$id)->delete();
        Session::flash('flash_message_delete', 'Sight Price Deleted !');
		return redirect('/adminwebsiteoperatorsight');
	}
}
