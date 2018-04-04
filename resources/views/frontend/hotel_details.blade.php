@extends('frontend.app')

@section('title', 'Hotel Details')

@section('body')

<!--====== BANNER ==========-->
<style>
.inner_banner{
background-image: url("{{ URL::to('/') }}/public/backendimages/{{$hotelDetails->hotel_image}}");
}
</style>

	<section>
		<div class="rows inner_banner inner_banner_2">
			<div class="container">
				<h2><span>{{$hotelDetails->hotel_name}}</span></h2>
				<ul>
					<li><a href="#inner-page-title">Home</a>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
					<li><a href="#inner-page-title" class="bread-acti">Hotel Booking</a>
					</li>
				</ul>
				<p>Location: {{$hotelDetails->hotel_country}}</p>
			</div>
		</div>
	</section>
	<!--====== TOUR DETAILS - BOOKING ==========-->
	<section>
		<div class="rows banner_book" id="inner-page-title">
			<div class="container">
				<div class="banner_book_1">
					<ul>
						<li class="dl1">Location : {{$hotelDetails->hotel_location}}</li>
						<li class="dl2">
							Price : {{$hotelDetails->hotel_price}}
							@if($optionscurrency)
								{{$optionscurrency->currency}}
							@endif
						</li>
						<li class="dl3">SKU : {{$hotelDetails->hotel_sku}}</li>
						<li class="dl4"><a href="{{ URL::to('/hotelbooking/')}}/{{$hotelDetails->hotel_id }}">Book Now</a> </li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!--====== TOUR DETAILS ==========-->
	<section>
		<div class="rows inn-page-bg com-colo">
			<div class="container inn-page-con-bg tb-space">
				<div class="col-md-9">
					<!--====== TOUR TITLE ==========-->
					<div class="tour_head">
						<h2>{{$hotelDetails->hotel_name}}

						<span class="tour_star">
							<?php
							$rating = $hotelDetails->hotel_rating;
							for ($x = 1; $x <= $rating; $x++) {
							?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php
							}
							?>
						</span>
						<span class="tour_rat">{{$hotelDetails->hotel_rating}}</span></h2> </div>
					<!--====== TOUR DESCRIPTION ==========-->
					<div class="tour_head1 hotel-com-color">
						<h3>About </h3>
						<p>{!!$hotelDetails->hotel_details!!}</p>
					</div>


					<!--====== Features ==========-->
					<div class="tour_head1 hot-ameni">
						<h3>Hotel Features</h3>
						<ul>
							<?php $hotel_features = explode(',',$hotelDetails->hotel_features); ?>
							@foreach($hotel_features as $hf)
							<li><i class="fa fa-check" aria-hidden="true"></i> {{$hf}} </li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="col-md-3 tour_r">
					<!--====== HELP PACKAGE ==========-->
					<div class="tour_right head_right tour_help tour-ri-com">
						<h3>Help & Support</h3>
						<div class="tour_help_1">
							<h4 class="tour_help_1_call">Call Us Now</h4>
							<h4><i class="fa fa-phone" aria-hidden="true"></i> {{$current_option->mobile}}</h4> </div>
					</div>
					<!--====== PUPULAR TOUR PACKAGES ==========-->
					<div class="tour_right tour_rela tour-ri-com">
						<h3>Popular Packages</h3>

						@foreach($hotelLatest as $hotel)
						<div class="tour_rela_1">
							<h3>{{$hotel->hotel_name}}</h3>
							<img src="{{URL('/')}}/public/backendimages/{{$hotel->hotel_image}}" alt="{{$hotel->hotel_name}}" />
							<h4>{{$hotel->hotel_location}}, {{$hotel->hotel_country}}</h4>
							<p>{!! $hotel->hotel_address !!}</p>
							<a href="{{URL('/')}}/hoteldetails/{{$hotel->hotel_id}}" class="link-btn">View this Package</a>
						</div>
						<hr style="margin:0;">
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>


@endsection
