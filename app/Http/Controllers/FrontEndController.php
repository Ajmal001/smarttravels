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

use Illuminate\Support\MessageBag;

use Image;
use Session;
use DB;
use Snowfire\Beautymail\Beautymail;

class FrontEndController extends Controller
{
   	
	public function home(){
		$countryList = TourCountry::get();	
		$locationList = TourLocation::get();
		$tour_packages = TourPackages::get();
		$hotels = Hotels::get();
		$sights = Sights::get();
		$current_option = Options::get()->first();
		
		return view('frontend.home',compact('tour_packages','hotels','countryList','locationList','sights','current_option','current_option'));		
	}
	
	public function tourDetails($package_id){
		$countryList = TourCountry::get();	
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();
		$packageDetails = TourPackages::find($package_id);
		return view('frontend.details',compact('packageDetails','countryList','locationList','current_option'));
	}
	
	public function tourPackages(){
		$countryList = TourCountry::get();	
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();
		$tourPackages = TourPackages::get();
		return view('frontend.packages',compact('tourPackages','countryList','locationList','current_option'));		
	}
	
	public function tourSearch(Request $request){
		$countryList = TourCountry::get();	
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();
		$s_country = $request->input('s_country');
		$s_package = $request->input('s_package');
		$s_arrival_date = $request->input('s_arrival_date');
		$s_departure_date = $request->input('s_departure_date');
		$min = $request->input('s_min_price');
		$max = $request->input('s_max_price');
		
		$tourPackages = DB::table('tour_package')
						->select(DB::raw("*"))
						->where('country', '=', $s_country)
						->where('general_package', '=', $s_package)
						->where('arrival_date','>=',$s_arrival_date)
						->where('departure_date','<=',$s_departure_date)
						->whereBetween('price', array((int) $min,  (int) $max))
						->get();
		
		return view('frontend.tour_search_result',compact('tourPackages','countryList','locationList','s_country','s_package','min','max','s_arrival_date','s_departure_date','current_option'));		
	}
	
	
	public function hotels(){
		$countryList = TourCountry::get();	
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();	
		$hotels = Hotels::get();	
		return view('frontend.hotels',compact('hotels','countryList','locationList','current_option'));		
	}
	
	public function hotelSearchLocation(Request $request){
			
		$countryList = TourCountry::get();	
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();
		$s_location = $request->input('s_location');
		
		$hotelLocationList = DB::table('hotels')	
							->where('hotel_location', '=', $s_location)
							->get();	
		return view('frontend.hotellocation',compact('countryList','locationList','hotelLocationList','s_location','current_option'));		
	}
	
	public function hotelSearchRatings(Request $request){
		$countryList = TourCountry::get();	
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();
		$s_ratings = $request->input('s_ratings');
		
		$hotelRatingList = DB::table('hotels')	
							->where('hotel_rating', '=', $s_ratings)
							->get();	
		return view('frontend.hotel_ratings',compact('countryList','locationList','hotelRatingList','s_ratings','current_option'));	
	}
	
	public function hotelSearchPrice(Request $request){
		$countryList = TourCountry::get();	
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();
		$s_price = $request->input('s_price');		
		$sf_price = $request->input('sf_price');
	    
		if(isset($s_price)){		
		$hotelPriceList = DB::table('hotels')
						->whereBetween('hotel_price',[$s_price, $s_price+1000] )
						->get();
        }
		
		if(isset($sf_price)){		
		$hotelPriceList = DB::table('hotels')
						->where('hotel_price', '>=', $sf_price)
						->get();
        }
		
		return view('frontend.hotel_price',compact('countryList','locationList','hotelPriceList','s_ratings','s_price','sf_price','current_option'));	
		
	}
	
	public function hotelDetails($hotel_id){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();		
		$hotelDetails = Hotels::find($hotel_id);
		return view('frontend.hotel_details',compact('hotelDetails','countryList','locationList','current_option'));		
	}
	
	public function sight(){
		$sightList = Sights::get();
		$countryList = TourCountry::get();
		$current_option = Options::get()->first();	
		$locationList = TourLocation::get();
		return view('frontend.sight_seeing',compact('countryList','locationList','sightList','current_option'));		
	}
	
	public function sightDetails($sight_id){
		$countryList = TourCountry::get();
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();	
		$sightDetails = Sights::find($sight_id);
		return view('frontend.sight_details',compact('sightDetails','countryList','locationList','current_option'));		
	}
	
	public function contact(){
		$countryList = TourCountry::get();	
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();	
		return view('frontend.contact',compact('countryList','locationList','current_option'));		
	}
	
	public function about(){
		$countryList = TourCountry::get();	
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();	
		return view('frontend.about',compact('countryList','locationList','current_option'));		
	}
	
	public function transfer(){
		$countryList = TourCountry::get();	
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();
		return view('frontend.transfer',compact('countryList','locationList','current_option'));	
	}
	
	public function insertTransfer(Request $request){
		$countryList = TourCountry::get();	
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();		
		
		$insertPic = new TransferPic();
		if($request->input('arrival_flight') != null AND
		   $request->input('arrival_time') != null
		){
		$insertPic->transfer_id = $request->input('transfer_id');
		$insertPic->arrival_flight = $request->input('arrival_flight');
		$insertPic->arrival_time = $request->input('arrival_time');
		$insertPic->pic_country = $request->input('pic_country');
		$insertPic->pic_city = $request->input('pic_city');
		$insertPic->pic_hotel = $request->input('pic_hotel');
		$insertPic->pic_person = $request->input('pic_person');
		$insertPic->pic_price = $request->input('pic_price');
		$insertPic->save();
		}
		
		$insertDrop = new TransferDrop();
		if($request->input('depart_flight') != null AND
		   $request->input('depart_time') != null
		){
		$insertDrop->transfer_id = $request->input('transfer_id');
		$insertDrop->depart_flight = $request->input('depart_flight');
		$insertDrop->depart_time = $request->input('depart_time');
		$insertDrop->drop_country = $request->input('drop_country');
		$insertDrop->drop_city = $request->input('drop_city');
		$insertDrop->drop_hotel = $request->input('drop_hotel');
		$insertDrop->drop_person = $request->input('drop_person');
		$insertDrop->drop_price = $request->input('drop_price');
		$insertDrop->save();
		}
		
		$insertInfo = new TransferInfo();
		if($request->input('full_name') != null AND
		   $request->input('mobile') != null
		){
		
		$insertInfo->transfer_id = $request->input('transfer_id');
		$insertInfo->full_name = $request->input('full_name');
		$insertInfo->emergency_contact = $request->input('emergency_contact');
		$insertInfo->email = $request->input('email');
		$insertInfo->mobile = $request->input('mobile');
		$insertInfo->save();
		}
		
		Session::flash('flash_message_insert', 'Application Sent Successfully !');
		return redirect('/transfer');	
	}
	
	public function attractions(){
		$countryList = TourCountry::get();	
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();
		
		$attractionsList = Attractions::get();
		return view('frontend.attraction_tickets',compact('countryList','locationList','attractionsList','current_option'));	
	}
	
	public function attractionDetails($id){
	    $countryList = TourCountry::get();	
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();
		
		$attractionDetails = Attractions::find($id);
		return view('frontend.attraction_details',compact('countryList','locationList','attractionDetails','current_option'));		
	}
	
	public function tourBooking($package_id){
		$countryList = TourCountry::get();	
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();
		
		return view('frontend.booking',compact('countryList','locationList','current_option'));	
	}
	
	public function tourBookingSave(Request $request){
		
		$insert = new Booking();
		$insert->b_date = date('Y-m-d H:i:s');
		$insert->service_id = $request->input('service_id');
		$insert->service_type = "tour";
		$insert->name = $request->input('name');
		$insert->mobile = $request->input('mobile');
		$insert->email = $request->input('email');
		$insert->city = $request->input('city');
		$insert->country = $request->input('country');
		$insert->no_of_adults = $request->input('no_of_adults');
		$insert->no_of_childrens = $request->input('no_of_childrens');	
		
		/****** Email Start *******/
		// Email To Admin
		$current_option= Options::get()->first();
		$to = $current_option->email;
		$subject = "Tour Booking";
		$message = "
		Name: $insert->name
		Mobile: $insert->mobile
		Email: $insert->email
		City: $insert->city 
		Country: $insert->country
		Adults: $insert->no_of_adults
		Children: $insert->no_of_childrens
		";
		$header = "From: info@techhaat.com\r\n"; 
		$header.= "MIME-Version: 1.0\r\n"; 
		$header.= "Content-Type: text/plain; charset=utf-8\r\n"; 
		$header.= "X-Priority: 1\r\n"; 
		
		mail($to, $subject, $message, $header);
		 
		// Email to Customer
		$to2 = $insert->email;
		$subject2 = "Thank You For Booking";
		$message2 = "
		Thank you $insert->name !!!
	    For Your Booking 
		";
		$header2 = "From: info@techhaat.com\r\n"; 
		$header2.= "MIME-Version: 1.0\r\n"; 
		$header2.= "Content-Type: text/plain; charset=utf-8\r\n"; 
		$header2.= "X-Priority: 1\r\n"; 
		
		mail($to2, $subject2, $message2, $header2);		
		/****** Email End *******/	
		
		
		$insert->save();
		Session::flash('flash_message_insert', 'Tour Booking Submitted Successfully !');		
		return redirect()->back();
	}
	
	public function hotelBooking($hotel_id){
		$countryList = TourCountry::get();	
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();
		
		return view('frontend.booking_hotel',compact('countryList','locationList','current_option'));	
	}
	
	public function hotelbookingsave(Request $request){
		$insert = new Booking();
		$insert->b_date = date('Y-m-d H:i:s');
		$insert->service_id = $request->input('service_id');
		$insert->service_type = "hotel";
		$insert->name = $request->input('name');
		$insert->mobile = $request->input('mobile');
		$insert->email = $request->input('email');
		$insert->city = $request->input('city');
		$insert->country = $request->input('country');
		$insert->no_of_adults = $request->input('no_of_adults');
		$insert->no_of_childrens	 = $request->input('no_of_childrens');
		$insert->date_from	= $request->input('date_from');
		$insert->date_to = $request->input('date_to');
		
		/****** Email Start *******/
		// Email To Admin
		$current_option= Options::get()->first();
		$to = $current_option->email;
		$subject = "Hotel Booking";
		$message = "
		Name: $insert->name
		Mobile: $insert->mobile
		Email: $insert->email
		City: $insert->city 
		Country: $insert->country
		Adults: $insert->no_of_adults
		Childrens: $insert->no_of_childrens
		Arrival Date: $insert->date_from
		Depart Date : $insert->date_to
		";
		$header = "From: info@techhaat.com\r\n"; 
		$header.= "MIME-Version: 1.0\r\n"; 
		$header.= "Content-Type: text/plain; charset=utf-8\r\n"; 
		$header.= "X-Priority: 1\r\n"; 
		
		mail($to, $subject, $message, $header);
		 
		// Email to Customer
		$to2 = $insert->email;
		$subject2 = "Thank You For Booking";
		$message2 = "
		Thank you $insert->name !!!
	    For Your Booking 
		";
		$header2 = "From: info@techhaat.com\r\n"; 
		$header2.= "MIME-Version: 1.0\r\n"; 
		$header2.= "Content-Type: text/plain; charset=utf-8\r\n"; 
		$header2.= "X-Priority: 1\r\n"; 
		
		mail($to2, $subject2, $message2, $header2);		
		/****** Email End *******/	
		

		$insert->save();
		Session::flash('flash_message_insert', 'Hotel Booking Submitted Successfully !');
		
		return redirect()->back();
	}
	
	public function sightBooking($sight_id){
		$countryList = TourCountry::get();	
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();
		
		return view('frontend.booking_sight',compact('countryList','locationList','current_option'));	
	}
	
	public function sightBookingSave(Request $request){
		$insert = new Booking();
		$insert->b_date = date('Y-m-d H:i:s');
		$insert->service_id = $request->input('service_id');
		$insert->service_type = "sight";
		$insert->name = $request->input('name');
		$insert->mobile = $request->input('mobile');
		$insert->email = $request->input('email');
		$insert->city = $request->input('city');
		$insert->country = $request->input('country');
		$insert->no_of_adults = $request->input('no_of_adults');
		$insert->no_of_childrens	 = $request->input('no_of_childrens');
		$insert->date_from	= $request->input('date_from');
		
		/****** Email Start *******/
		// Email To Admin
		$current_option= Options::get()->first();
		$to = $current_option->email;
		$subject = "Sight Booking";
		$message = "
		Name: $insert->name
		Mobile: $insert->mobile
		Email: $insert->email
		City: $insert->city 
		Country: $insert->country
		Adults: $insert->no_of_adults
		Childrens: $insert->no_of_childrens
		Visit Date: $insert->date_from
		
		";
		$header = "From: info@techhaat.com\r\n"; 
		$header.= "MIME-Version: 1.0\r\n"; 
		$header.= "Content-Type: text/plain; charset=utf-8\r\n"; 
		$header.= "X-Priority: 1\r\n"; 
		
		mail($to, $subject, $message, $header);
		 
		// Email to Customer
		$to2 = $insert->email;
		$subject2 = "Thank You For Booking";
		$message2 = "
		Thank you $insert->name !!!
	    For Your Booking 
		";
		$header2 = "From: info@techhaat.com\r\n"; 
		$header2.= "MIME-Version: 1.0\r\n"; 
		$header2.= "Content-Type: text/plain; charset=utf-8\r\n"; 
		$header2.= "X-Priority: 1\r\n"; 
		
		mail($to2, $subject2, $message2, $header2);		
		/****** Email End *******/	
		
		$insert->save();
		Session::flash('flash_message_insert', 'Sight Booking Submitted Successfully !');
		
		return redirect()->back();
	}
	
	public function attractionBooking($id){
		$countryList = TourCountry::get();	
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();
		
		return view('frontend.booking_attraction',compact('countryList','locationList','current_option'));	
	}
	
	public function attractionBookingSave(Request $request){
		$insert = new Booking();
		$insert->b_date = date('Y-m-d H:i:s');
		$insert->service_id = $request->input('service_id');
		$insert->service_type = "attractions";
		$insert->name = $request->input('name');
		$insert->mobile = $request->input('mobile');
		$insert->email = $request->input('email');
		$insert->city = $request->input('city');
		$insert->country = $request->input('country');

		/****** Email Start *******/
		// Email To Admin
		$current_option= Options::get()->first();
		$to = $current_option->email;
		$subject = "Attraction Ticket Booking";
		$message = "
		Name: $insert->name
		Mobile: $insert->mobile
		Email: $insert->email
		City: $insert->city 
		Country: $insert->country
		Adults: $insert->no_of_adults
		Childrens: $insert->no_of_childrens
		Visit Date: $insert->date_from
		
		";
		$header = "From: info@techhaat.com\r\n"; 
		$header.= "MIME-Version: 1.0\r\n"; 
		$header.= "Content-Type: text/plain; charset=utf-8\r\n"; 
		$header.= "X-Priority: 1\r\n"; 
		
		mail($to, $subject, $message, $header);
		 
		// Email to Customer
		$to2 = $insert->email;
		$subject2 = "Thank You For Booking";
		$message2 = "
		Thank you $insert->name !!!
	    For Your Booking 
		";
		$header2 = "From: info@techhaat.com\r\n"; 
		$header2.= "MIME-Version: 1.0\r\n"; 
		$header2.= "Content-Type: text/plain; charset=utf-8\r\n"; 
		$header2.= "X-Priority: 1\r\n"; 
		
		mail($to2, $subject2, $message2, $header2);		
		/****** Email End *******/	
				
		$insert->save();
		Session::flash('flash_message_insert', 'Attraction Ticket Booking Submitted Successfully !');
		
		return redirect()->back();
	}
	
	public function airTicketBooking(){
		$countryList = TourCountry::get();	
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();
		
		return view('frontend.booking_air_ticket',compact('countryList','locationList','current_option'));	
	}
	
	public function airTicketBookingSave(Request $request){
		$insert = new Booking();
		$insert->b_date = date('Y-m-d H:i:s');
		$insert->service_id = $request->input('service_id');
		$insert->service_type = "air_ticket";
		$insert->name = $request->input('name');
		$insert->mobile = $request->input('mobile');
		$insert->email = $request->input('email');
		$insert->city = $request->input('city');
		$insert->country = $request->input('country');		
		$insert->no_of_adults = $request->input('no_of_adults');
		$insert->no_of_childrens = $request->input('no_of_childrens');
		$insert->no_of_infant = $request->input('no_of_infant');
		$insert->date_from	= $request->input('date_from');	
		$insert->date_to	= $request->input('date_to');
		
		//Image
		
		if($request->hasFile('image')){
			$image = $request->file('image');
			$filename = time().'.'.$image->getClientOriginalExtension();
			Image::make($image)->resize(550,330)->save(public_path('/backendimages/'.$filename));			
			$insert->image= $filename;
		}
		else{
			$filename = 'ticke_default.png';
			$insert->image= $filename;
		}

		/****** Email Start *******/
		// Email To Admin
		$current_option= Options::get()->first();
		$to = $current_option->email;
		$subject = "Air Ticket Booking";
		$message = "
		Name: $insert->name
		Mobile: $insert->mobile
		Email: $insert->email
		City: $insert->city 
		Country: $insert->country
		Adults: $insert->no_of_adults
		Childrens: $insert->no_of_childrens
		Visit Date: $insert->date_from
		
		";
		$header = "From: info@techhaat.com\r\n"; 
		$header.= "MIME-Version: 1.0\r\n"; 
		$header.= "Content-Type: text/plain; charset=utf-8\r\n"; 
		$header.= "X-Priority: 1\r\n"; 
		
		mail($to, $subject, $message, $header);
		 
		// Email to Customer
		$to2 = $insert->email;
		$subject2 = "Thank You For Booking";
		$message2 = "
		Thank you $insert->name !!!
	    For Your Booking 
		";
		$header2 = "From: info@techhaat.com\r\n"; 
		$header2.= "MIME-Version: 1.0\r\n"; 
		$header2.= "Content-Type: text/plain; charset=utf-8\r\n"; 
		$header2.= "X-Priority: 1\r\n"; 
		
		mail($to2, $subject2, $message2, $header2);		
		/****** Email End *******/		
		
		$insert->save();
		Session::flash('flash_message_insert', 'Air Ticket Booking Submitted Successfully !');
		
		return redirect()->back();
	}
	
	public function visa(){
		$countryList = TourCountry::get();	
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();
		
		return view('frontend.visa',compact('countryList','locationList','current_option'));	
	}
	
	public function visaApply(Request $request){
		
		$countryList = TourCountry::get();	
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();
		
		$s_country = $request->input('s_country');						
		$visaRequirement = Visa::where('country', '=', $s_country)->first();				
		
		return view('frontend.visa_apply',compact('countryList','locationList','current_option','s_country','visaRequirement'));	
	}
	
	public function visaApplicationSave(Request $request){
		$countryList = TourCountry::get();	
		$locationList = TourLocation::get();
		$current_option = Options::get()->first();
		
		$s_country = $request->input('s_country');	
		
		$insert = new VisaApplication();
		$insert->country = $request->input('country');
		$insert->first_name = $request->input('first_name');
		$insert->last_name = $request->input('last_name');
		$insert->email = $request->input('email');
		$insert->mobile = $request->input('mobile');
		$insert->address = $request->input('address');
		$insert->profession = $request->input('profession');
		$insert->company = $request->input('company');
		$insert->passport_no = $request->input('passport_no');
		$insert->arrival_date = $request->input('arrival_date');
		
		//User Image
		
		if($request->hasFile('image_user')){
			$image = $request->file('image_user');
			$filename = time().'.'.$image->getClientOriginalExtension()+3;
			Image::make($image)->resize(550,330)->save(public_path('/backendimages/'.$filename));			
			$insert->image_user= $filename;
		}
		else{
			$filename = 'user_default.png';
			$insert->image_user= $filename;
		}
		
		
		//Passport Image
		
		if($request->hasFile('image_passport')){
			$image = $request->file('image_passport');
			$filename = time().'.'.$image->getClientOriginalExtension();
			Image::make($image)->resize(550,330)->save(public_path('/backendimages/'.$filename));			
			$insert->image_passport= $filename;
		}
		else{
			$filename = 'passport_default.png';
			$insert->image_passport= $filename;
		}
		
		/****** Email Start *******/
		// Email To Admin
		$current_option= Options::get()->first();
		$to = $current_option->email;
		$subject = "Visa Booking";
		$message = "
		First Name: $insert->first_name
		Last Name: $insert->last_name
		Mobile: $insert->mobile
		Email: $insert->email
		Address: $insert->address
		Profession : $insert->profession
		Company: $insert->company
		Passport No : $insert->passport_no
		Arrival Date: $insert->arrival_date
		";
		$header = "From: info@techhaat.com\r\n"; 
		$header.= "MIME-Version: 1.0\r\n"; 
		$header.= "Content-Type: text/plain; charset=utf-8\r\n"; 
		$header.= "X-Priority: 1\r\n"; 
		
		mail($to, $subject, $message, $header);
		 
		// Email to Customer
		$to2 = $insert->email;
		$subject2 = "Thank You For Booking";
		$message2 = "
		Thank you $insert->name !!!
	    For Your Booking 
		";
		$header2 = "From: info@techhaat.com\r\n"; 
		$header2.= "MIME-Version: 1.0\r\n"; 
		$header2.= "Content-Type: text/plain; charset=utf-8\r\n"; 
		$header2.= "X-Priority: 1\r\n"; 
		
		mail($to2, $subject2, $message2, $header2);		
		/****** Email End *******/	
			
		$insert->save();
		Session::flash('flash_message_insert', 'Visa Application Submitted Successfully !');
		
		return redirect('/visaapply');
	}
	
}
