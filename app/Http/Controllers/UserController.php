<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TourPackages;
use App\TourCountry;
use App\TourLocation;
use App\Hotels;
use App\Booking;
use App\Sights;
use App\TransferInfo;
use App\TransferPic;
use App\TransferDrop;
use App\Attractions;
use App\Options;
use App\Visa;
use App\VisaApplication;

use App\Models\Operator\Sight;


use Illuminate\Support\MessageBag;

use Image;
use Session;
use DB;
use Snowfire\Beautymail\Beautymail;

class UserController extends Controller
{
    public function userLogin(){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();

		return view('frontend.users.user_login',compact('countryList','locationList','current_option'));

	}

	public function userRegister(){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();


		return view('frontend.users.user_register',compact('countryList','locationList','current_option'));

	}

	public function userForgetPassword(){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();

		return view('frontend.users.user_forget_password',compact('countryList','locationList','current_option'));

	}

	public function userDashboard(){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();

		return view('frontend.users.user_dashboard',compact('countryList','locationList','current_option'));
	}

	public function userTourOperatorCountry(){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();
		$sightList =  Sight::get();

		return view('frontend.users.user_tour_operator_country',compact('countryList','locationList','current_option','sightList'));
	}

	public function userTourOperatorOptions(Request $request){
	    $countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();
		$sightList =  Sight::get();

		$v_country = $request->input("country");
		$v_location = $request->input('location');

		$one_way_air_ticket_price = DB::table('operator_air_ticket')
									->where('country', $v_country)
									->where('location', $v_location)
									->value('one_way');

		return view('frontend.users.user_tour_operator_price',compact('one_way_air_ticket_price','v_country','v_location','countryList','locationList','current_option','sightList'));

	}

	public function userTourOperatorPrice(){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();
		$sightList =  Sight::get();

		return view('frontend.users.user_tour_operator_price',compact('countryList','locationList','current_option','sightList'));

	}

  public function findLocation(Request $request){
    $data=TourLocation::select('location_name','location_id')->where('country_id',$request->id)->take(100)->get();
    return response()->json($data);
  }


	public function userTourOperatorCostSave(Request $request){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$sightList =  Sight::get();
		$current_option = Options::get()->first();


		// Visitor Info
		$v_name = $request->input("v_name");
		$v_email = $request->input("v_email");

		$v_person_adult = $request->input("v_person_adult");
		$v_person_child = $request->input("v_person_child");
		$v_person_infant = $request->input("v_person_infant");

		$total_person = $v_person_adult + $v_person_child + $v_person_infant;

		$v_duration = $request->input("v_duration");
		$v_duration_night = $v_duration +1;

		$v_country = $request->input("v_country");
		$v_location = $request->input('v_location');

		$v_air_ticket_type = $request->input("v_air_ticket_type");

		if($request->input('v_sights') == !null){
			$v_sights = $request->input('v_sights');
		}
		else{
			$v_sights = null;
		}

		if($request->input('tour_locations') == !null){
			$tour_locations = $request->input('tour_locations');
		}
		else{
			$tour_locations = null;
		}


		$v_hotel_room = $request->input("v_hotel_room");
		$v_hotel_rating = $request->input("v_hotel_rating");
		$v_food_type_lunch = $request->input("v_food_type_lunch");
		$v_food_type_dinner = $request->input("v_food_type_dinner");

		$v_transfer_type_pic = $request->input("v_transfer_type_pic");
		$v_transfer_type_drop = $request->input("v_transfer_type_drop");


		// Price based on Visitor Info

		// Air Ticket
		$air_ticket_price = DB::table('operator_air_ticket')
							->where('country', $v_country)
							->where('location', $v_location)
							->where('type', $v_air_ticket_type)
							->value('price');

		$air_ticket_price_adult =  $air_ticket_price * $v_person_adult ;
		$air_ticket_price_child =  $air_ticket_price * $v_person_child * .70;
		$air_ticket_price_infant = $air_ticket_price * $v_person_infant * 1.2;
		$air_ticket_price_total = $air_ticket_price_adult + $air_ticket_price_child + $air_ticket_price_infant;


		// Hotel Price
	    $hotel_price   = DB::table('operator_hotel')
						->where('country', $v_country)
						->where('location', $v_location)
						->where('rating', $v_hotel_rating)
						->value('price');

		// Sight Seeing List
		if(isset($v_sights)){
		$v_sights_list = DB::table('operator_sight')
						->where('country', $v_country)
						->whereIn('name', $v_sights)
						->get();
		}
		else{
		$v_sights_list = null;
		}

		// Tour Locations List
		if(isset($tour_locations)){
		$tour_locations_list = DB::table('operator_location')
						->where('country', $v_country)
						->whereIn('location', $tour_locations)
						->get();
		}
		else{
		$tour_locations_list = null;
		}

		// Food Price
		$food_lunch_price = DB::table('operator_food')
						->where('country', $v_country)
						->where('type', "Lunch")
						->value('price');

		$food_dinner_price = DB::table('operator_food')
						->where('country', $v_country)
						->where('type', "Dinner")
						->value('price');

		if(isset($v_food_type_lunch) && !isset($v_food_type_dinner)){
			$food_price =  $food_lunch_price;
		}
		elseif(!isset($v_food_type_lunch) && isset($v_food_type_dinner)){
			$food_price =  $food_dinner_price;
		}
		elseif(isset($v_food_type_lunch) && isset($v_food_type_dinner)){
			$food_price =  $food_lunch_price + $food_dinner_price;
		}
		else{
			$food_price = 0;
		}


		// Transfer
        $transfer_price_single = DB::table('operator_pic_drop')
						->where('country', $v_country)
						->where('location', $v_location)
						->value('price');

		if(isset($v_transfer_type_pic) && !isset($v_transfer_type_drop)){
			$transfer_price =  $transfer_price_single;
		}
		elseif(!isset($v_transfer_type_pic) && isset($v_transfer_type_drop)){
			$transfer_price =  $transfer_price_single;
		}
		elseif(isset($v_transfer_type_pic) && isset($v_transfer_type_drop)){
			$transfer_price =  $transfer_price_single * 2;
		}
		else{
			$transfer_price = 0;
		}

		// Total

		$total_air_ticket_price = ($air_ticket_price * $v_person_adult) +
								($air_ticket_price * $v_person_child * .70) +
								($air_ticket_price * $v_person_infant * 1.2 );

		$total_hotel_price = $hotel_price * $v_duration * $v_hotel_room;

		if(isset($v_sights)){
		$total_sights_price_one_person =  DB::table('operator_sight')
						->where('country', $v_country)
						->whereIn('name', $v_sights)
						->sum('price');

		$total_sights_price = $total_sights_price_one_person * $total_person;
		}
		else{
		$total_sights_price = 0;
		}

		if(isset($tour_locations)){
		$total_tour_locations_price_one_person =  DB::table('operator_location')
						->where('country', $v_country)
						->whereIn('location', $tour_locations)
						->sum('price');

		$total_tour_locations_price	= $total_tour_locations_price_one_person * $total_person;
		}
		else{
		$total_tour_locations_price = 0;
		}

		$total_food_price = $food_price * $v_duration * $total_person;

		$total = $transfer_price + $total_food_price + $total_hotel_price + $total_air_ticket_price + $total_sights_price + $total_tour_locations_price;


		return view('frontend.users.user_tour_operator_cost_result',compact('total','v_name','v_email','tour_locations','tour_locations_list','total_tour_locations_price','total_food_price','v_food_type_dinner','v_food_type_lunch','v_sights_list','total_sights_price','v_sights_price','v_sights','transfer_price_single','v_duration_night','v_hotel_room','total_hotel_price','air_ticket_price_adult','air_ticket_price_child','air_ticket_price_infant','air_ticket_price_total','food_price','v_person_adult','v_person_child','v_person_infant','v_country','v_location','v_duration','air_ticket_price','hotel_price','food_lunch_price','food_dinner_price','transfer_price','countryList','locationList','current_option','sightList'));

	}

	public function userTourOperatorCost(){
	    $countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();
		$sightList =  DB::table('operator_sight')->get();
		$tourLocationList =  DB::table('operator_location')->get();

	   return view('frontend.users.user_tour_operator_cost',compact('tourLocationList','v_person_adult','v_person_child','v_person_infant','v_country','v_location','v_duration','air_ticket_price','hotel_price','food_lunch_price','food_dinner_price','transfer_price','countryList','locationList','current_option','sightList'));
	}

	public function userTourOperatorCostMultiple(){
	    $countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();
		$sightList =  DB::table('operator_sight')->get();
		$tourLocationList =  DB::table('operator_location')->get();

	   return view('frontend.users.user_tour_operator_cost_multiple',compact('tourLocationList','countryList','locationList','current_option','sightList'));
	}

	public function userTourOperatorCostMultipleSave(Request $request){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();
		$sightList =  DB::table('operator_sight')->get();
		$tourLocationList =  DB::table('operator_location')->get();

		// Visitor Info
		$v_name = $request->input("v_name");
		$v_email = $request->input("v_email");

		$v_person_adult = $request->input("v_person_adult");
		$v_person_child = $request->input("v_person_child");
		$v_person_infant = $request->input("v_person_infant");
		$total_person = $v_person_adult + $v_person_child + $v_person_infant;

		$v_air_ticket_cost = $request->input("v_air_ticket_cost");

		$v_hotel_room = $request->input("v_hotel_room");
		$v_hotel_rating = $request->input("v_hotel_rating");

		$v_food_type_lunch = $request->input("v_food_type_lunch");
		$v_food_type_dinner = $request->input("v_food_type_dinner");

		$v_transfer_type_pic = $request->input("v_transfer_type_pic");
		$v_transfer_type_drop = $request->input("v_transfer_type_drop");


		// ---------------------- Country 1 ----------------------------//
		$v_country1 = $request->input("v_country1");
		$v_location1 = $request->input("v_location1");
		$v_duration1 = $request->input("v_duration1");
		$v_sights1 = $request->input("v_sights1");
		$tour_locations1 = $request->input("tour_locations1");

		// Hotel
		$hotel_price1   = DB::table('operator_hotel')
						->where('country', $v_country1)
						->where('location', $v_location1)
						->where('rating', $v_hotel_rating)
						->value('price');

		$total_hotel_price1 = $hotel_price1 * $v_duration1 * $v_hotel_room;

		// Food
		$food_lunch_price1 = DB::table('operator_food')
						->where('country', $v_country1)
						->where('type', "Lunch")
						->value('price');

		$food_dinner_price1 = DB::table('operator_food')
						->where('country', $v_country1)
						->where('type', "Dinner")
						->value('price');

		if(isset($v_food_type_lunch) && !isset($v_food_type_dinner)){
			$food_price1 =  $food_lunch_price1;
		}
		elseif(!isset($v_food_type_lunch) && isset($v_food_type_dinner)){
			$food_price1 =  $food_dinner_price1;
		}
		elseif(isset($v_food_type_lunch) && isset($v_food_type_dinner)){
			$food_price1 =  $food_lunch_price1 + $food_dinner_price1;
		}
		else{
			$food_price1 = 0;
		}

		$total_food_price1 = $food_price1 * $v_duration1 * $total_person;

		// Sight
		if(isset($v_sights1)){
		$total_sights_price_one_person =  DB::table('operator_sight')
						->where('country', $v_country1)
						->whereIn('name', $v_sights1)
						->sum('price');

		$total_sights_price1 = $total_sights_price_one_person * $total_person;
		}
		else{
		$total_sights_price1 = 0;
		}

		// Locations
		if(isset($tour_locations1)){
		$total_tour_locations_price_one_person =  DB::table('operator_location')
						->where('country', $v_country1)
						->whereIn('location', $tour_locations1)
						->sum('price');

		$total_tour_locations_price1	= $total_tour_locations_price_one_person * $total_person;
		}
		else{
		$total_tour_locations_price1 = 0;
		}

		// Transfer
        $transfer_price_single1 = DB::table('operator_pic_drop')
						->where('country', $v_country1)
						->where('location', $v_location1)
						->value('price');

		if(isset($v_transfer_type_pic) && !isset($v_transfer_type_drop)){
			$transfer_price1 =  $transfer_price_single1;
		}
		elseif(!isset($v_transfer_type_pic) && isset($v_transfer_type_drop)){
			$transfer_price1 =  $transfer_price_single1;
		}
		elseif(isset($v_transfer_type_pic) && isset($v_transfer_type_drop)){
			$transfer_price1 =  $transfer_price_single1 * 2;
		}
		else{
			$transfer_price1 = 0;
		}

	   $total1 = $transfer_price1 + $total_food_price1 + $total_hotel_price1 + $total_sights_price1 + $total_tour_locations_price1;


	    // ---------------------- Country 2 ----------------------------//
		$v_country2 = $request->input("v_country2");
		$v_location2 = $request->input("v_location2");
		$v_duration2 = $request->input("v_duration2");
		$v_sights2 = $request->input("v_sights2");
		$tour_locations2 = $request->input("tour_locations2");

		// Hotel
		$hotel_price2   = DB::table('operator_hotel')
						->where('country', $v_country2)
						->where('location', $v_location2)
						->where('rating', $v_hotel_rating)
						->value('price');

		$total_hotel_price2 = $hotel_price2 * $v_duration2 * $v_hotel_room;

		// Food
		$food_lunch_price2 = DB::table('operator_food')
						->where('country', $v_country2)
						->where('type', "Lunch")
						->value('price');

		$food_dinner_price2 = DB::table('operator_food')
						->where('country', $v_country2)
						->where('type', "Dinner")
						->value('price');

		if(isset($v_food_type_lunch) && !isset($v_food_type_dinner)){
			$food_price2 =  $food_lunch_price2;
		}
		elseif(!isset($v_food_type_lunch) && isset($v_food_type_dinner)){
			$food_price2 =  $food_dinner_price2;
		}
		elseif(isset($v_food_type_lunch) && isset($v_food_type_dinner)){
			$food_price2 =  $food_lunch_price2 + $food_dinner_price2;
		}
		else{
			$food_price2 = 0;
		}

		$total_food_price2 = $food_price2 * $v_duration2 * $total_person;

		// Sight
		if(isset($v_sights2)){
		$total_sights_price_one_person =  DB::table('operator_sight')
						->where('country', $v_country2)
						->whereIn('name', $v_sights2)
						->sum('price');

		$total_sights_price2 = $total_sights_price_one_person * $total_person;
		}
		else{
		$total_sights_price2 = 0;
		}

		// Locations
		if(isset($tour_locations2)){
		$total_tour_locations_price_one_person =  DB::table('operator_location')
						->where('country', $v_country2)
						->whereIn('location', $tour_locations2)
						->sum('price');

		$total_tour_locations_price2	= $total_tour_locations_price_one_person * $total_person;
		}
		else{
		$total_tour_locations_price2 = 0;
		}

		// Transfer
        $transfer_price_single2 = DB::table('operator_pic_drop')
						->where('country', $v_country2)
						->where('location', $v_location2)
						->value('price');

		if(isset($v_transfer_type_pic) && !isset($v_transfer_type_drop)){
			$transfer_price2 =  $transfer_price_single2;
		}
		elseif(!isset($v_transfer_type_pic) && isset($v_transfer_type_drop)){
			$transfer_price2 =  $transfer_price_single2;
		}
		elseif(isset($v_transfer_type_pic) && isset($v_transfer_type_drop)){
			$transfer_price2 =  $transfer_price_single2 * 2;
		}
		else{
			$transfer_price2 = 0;
		}

	   $total2 = $transfer_price2 + $total_food_price2 + $total_hotel_price2 + $total_sights_price2 + $total_tour_locations_price2;


		// ---------------------- Country 3 ----------------------------//
		$v_country3 = $request->input("v_country3");
		$v_location3 = $request->input("v_location3");
		$v_duration3 = $request->input("v_duration3");
		$v_sights3 = $request->input("v_sights3");
		$tour_locations3 = $request->input("tour_locations3");

		// Hotel
		$hotel_price3   = DB::table('operator_hotel')
						->where('country', $v_country3)
						->where('location', $v_location3)
						->where('rating', $v_hotel_rating)
						->value('price');

		$total_hotel_price3 = $hotel_price3 * $v_duration3 * $v_hotel_room;

		// Food
		$food_lunch_price3 = DB::table('operator_food')
						->where('country', $v_country3)
						->where('type', "Lunch")
						->value('price');

		$food_dinner_price3 = DB::table('operator_food')
						->where('country', $v_country3)
						->where('type', "Dinner")
						->value('price');

		if(isset($v_food_type_lunch) && !isset($v_food_type_dinner)){
			$food_price3 =  $food_lunch_price3;
		}
		elseif(!isset($v_food_type_lunch) && isset($v_food_type_dinner)){
			$food_price3 =  $food_dinner_price3;
		}
		elseif(isset($v_food_type_lunch) && isset($v_food_type_dinner)){
			$food_price3 =  $food_lunch_price3 + $food_dinner_price3;
		}
		else{
			$food_price3 = 0;
		}

		$total_food_price3 = $food_price3 * $v_duration3 * $total_person;

		// Sight
		if(isset($v_sights3)){
		$total_sights_price_one_person =  DB::table('operator_sight')
						->where('country', $v_country3)
						->whereIn('name', $v_sights3)
						->sum('price');

		$total_sights_price3 = $total_sights_price_one_person * $total_person;
		}
		else{
		$total_sights_price3 = 0;
		}

		// Locations
		if(isset($tour_locations3)){
		$total_tour_locations_price_one_person =  DB::table('operator_location')
						->where('country', $v_country3)
						->whereIn('location', $tour_locations3)
						->sum('price');

		$total_tour_locations_price3	= $total_tour_locations_price_one_person * $total_person;
		}
		else{
		$total_tour_locations_price3 = 0;
		}

		// Transfer
        $transfer_price_single3 = DB::table('operator_pic_drop')
						->where('country', $v_country3)
						->where('location', $v_location3)
						->value('price');

		if(isset($v_transfer_type_pic) && !isset($v_transfer_type_drop)){
			$transfer_price3 =  $transfer_price_single3;
		}
		elseif(!isset($v_transfer_type_pic) && isset($v_transfer_type_drop)){
			$transfer_price3 =  $transfer_price_single3;
		}
		elseif(isset($v_transfer_type_pic) && isset($v_transfer_type_drop)){
			$transfer_price3 =  $transfer_price_single3 * 3;
		}
		else{
			$transfer_price3 = 0;
		}

	   $total3 = $transfer_price3 + $total_food_price3 + $total_hotel_price3 + $total_sights_price3 + $total_tour_locations_price3;


	   // ---------------------- Country 4 ----------------------------//
		$v_country4 = $request->input("v_country4");
		$v_location4 = $request->input("v_location4");
		$v_duration4 = $request->input("v_duration4");
		$v_sights4 = $request->input("v_sights4");
		$tour_locations4 = $request->input("tour_locations4");

		// Hotel
		$hotel_price4   = DB::table('operator_hotel')
						->where('country', $v_country4)
						->where('location', $v_location4)
						->where('rating', $v_hotel_rating)
						->value('price');

		$total_hotel_price4 = $hotel_price4 * $v_duration4 * $v_hotel_room;

		// Food
		$food_lunch_price4 = DB::table('operator_food')
						->where('country', $v_country4)
						->where('type', "Lunch")
						->value('price');

		$food_dinner_price4 = DB::table('operator_food')
						->where('country', $v_country4)
						->where('type', "Dinner")
						->value('price');

		if(isset($v_food_type_lunch) && !isset($v_food_type_dinner)){
			$food_price4 =  $food_lunch_price4;
		}
		elseif(!isset($v_food_type_lunch) && isset($v_food_type_dinner)){
			$food_price4 =  $food_dinner_price4;
		}
		elseif(isset($v_food_type_lunch) && isset($v_food_type_dinner)){
			$food_price4 =  $food_lunch_price4 + $food_dinner_price4;
		}
		else{
			$food_price4 = 0;
		}

		$total_food_price4 = $food_price4 * $v_duration4 * $total_person;

		// Sight
		if(isset($v_sights4)){
		$total_sights_price_one_person =  DB::table('operator_sight')
						->where('country', $v_country4)
						->whereIn('name', $v_sights4)
						->sum('price');

		$total_sights_price4 = $total_sights_price_one_person * $total_person;
		}
		else{
		$total_sights_price4 = 0;
		}

		// Locations
		if(isset($tour_locations4)){
		$total_tour_locations_price_one_person =  DB::table('operator_location')
						->where('country', $v_country4)
						->whereIn('location', $tour_locations4)
						->sum('price');

		$total_tour_locations_price4	= $total_tour_locations_price_one_person * $total_person;
		}
		else{
		$total_tour_locations_price4 = 0;
		}

		// Transfer
        $transfer_price_single4 = DB::table('operator_pic_drop')
						->where('country', $v_country4)
						->where('location', $v_location4)
						->value('price');

		if(isset($v_transfer_type_pic) && !isset($v_transfer_type_drop)){
			$transfer_price4 =  $transfer_price_single4;
		}
		elseif(!isset($v_transfer_type_pic) && isset($v_transfer_type_drop)){
			$transfer_price4 =  $transfer_price_single4;
		}
		elseif(isset($v_transfer_type_pic) && isset($v_transfer_type_drop)){
			$transfer_price4 =  $transfer_price_single4 * 4;
		}
		else{
			$transfer_price4 = 0;
		}

	   $total_duration = $v_duration1 + $v_duration2 + $v_duration3 + $v_duration4;

	   $total4 = $transfer_price4 + $total_food_price4 + $total_hotel_price4 + $total_sights_price4 + $total_tour_locations_price4;

	   $total_tour_cost = $total1 + $total2 + $total3 + $total4;

	   $grand_total = $total1 + $total2 + $total3 + $total4 + $v_air_ticket_cost;

	   return view('frontend.users.user_tour_operator_cost_multiple_result',compact(
	   'tourLocationList',
	   'countryList',
	   'locationList',
	   'current_option',
	   'sightList',
	   'v_person_adult',
	   'v_person_child',
	   'v_person_infant',
	   'total_person',
	   'v_name',
	   'v_email',
	   'v_country1',
	   'v_location1',
	   'v_sights1',
	   'v_air_ticket_cost',
	   'tour_locations1',
	   'total_sights_price1',
	   'total_tour_locations_price1',
	   'hotel_price1',
	   'v_hotel_room',
	   'total_hotel_price1',
	   'food_price1',
	   'total_food_price1',
	   'transfer_price_single1',
	   'transfer_price1',
	   'total1',
	   'v_country2',
		'v_location2',
		'v_sights2',
		'tour_locations2',
		'total_sights_price2',
		'total_tour_locations_price2',
		'hotel_price2',
		'v_hotel_room',
		'total_hotel_price2',
		'food_price2',
		'total_food_price2',
		'transfer_price_single2',
		'transfer_price2',
		'total2',
		'v_country3',
		'v_location3',
		'v_sights3',
		'tour_locations3',
		'total_sights_price3',
		'total_tour_locations_price3',
		'hotel_price3',
		'v_hotel_room',
		'total_hotel_price3',
		'food_price3',
		'total_food_price3',
		'transfer_price_single3',
		'transfer_price3',
		'total3',
		'v_country4',
		'v_location4',
		'v_sights4',
		'tour_locations4',
		'total_sights_price4',
		'total_tour_locations_price4',
		'hotel_price4',
		'v_hotel_room',
		'total_hotel_price4',
		'food_price4',
		'total_food_price4',
		'transfer_price_single4',
		'transfer_price4',
		'total_duration',
		'total4',
		'total_tour_cost',
		'grand_total'
	   ));
	}

}
