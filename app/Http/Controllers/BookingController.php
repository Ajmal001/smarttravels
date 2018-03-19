<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;

use Session;
use DB;

class BookingController extends Controller
{
    public function bookingTour(){

		$tourBooking = DB::table('booking')
						->where('service_type', '=', 'tour')
						->latest()->paginate(10);

		return view('backend.website.website_booking_tour',compact('tourBooking'));
	}

	public function bookingHotel(){

		$hotelBooking = DB::table('booking')
						->where('service_type', '=', 'hotel')
						->latest()->paginate(10);

		return view('backend.website.website_booking_hotel',compact('hotelBooking'));
	}

	public function bookingSight(){

		$sightBooking = DB::table('booking')
						->where('service_type', '=', 'sight')
						->latest()->paginate(10);

		return view('backend.website.website_booking_sight',compact('sightBooking'));
	}

	public function bookingAttraction(){

		$attractionBooking = DB::table('booking')
						->where('service_type', '=', 'sight')
						->latest()->paginate(10);

		return view('backend.website.website_booking_attraction',compact('attractionBooking'));
	}

	public function bookingAirTicket(){

		$airTicketBooking = DB::table('booking')
						->where('service_type', '=', 'air_ticket')
						->latest()->paginate(10);

		return view('backend.website.website_booking_air_ticket',compact('airTicketBooking'));
	}

	public function deleteBooking($booking_id){
		DB::table('booking')->where('booking_id',$booking_id)->delete();
        Session::flash('flash_message_delete', 'Booking Deleted !');
		return redirect()->back();
	}



}
