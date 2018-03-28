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
					<!--====== SPECIAL OFFERS ==========-->
					<div class="tour_right tour_offer">
						<div class="band1"><img src="images/offer.png" alt="" /> </div>
						<p>Special Offer</p>
						<h4>$500<span class="n-td">
								<span class="n-td-1">$800</span>
								</span>
							</h4> <a href="booking1.html" class="link-btn">Book Now</a> </div>

					<!--====== PACKAGE SHARE ==========-->
					<div class="tour_right head_right tour_social tour-ri-com">
						<h3>Share This Package</h3>
						<ul>
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
							<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
							<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
							<li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
						</ul>
					</div>
					<!--====== HELP PACKAGE ==========-->
					<div class="tour_right head_right tour_help tour-ri-com">
						<h3>Help & Support</h3>
						<div class="tour_help_1">
							<h4 class="tour_help_1_call">Call Us Now</h4>
							<h4><i class="fa fa-phone" aria-hidden="true"></i> 10-800-123-000</h4> </div>
					</div>
					<!--====== PUPULAR TOUR PACKAGES ==========-->
					<div class="tour_right tour_rela tour-ri-com">
						<h3>Popular Packages</h3>
						<div class="tour_rela_1"> <img src="images/related1.png" alt="" />
							<h4>Dubai 7Days / 6Nights</h4>
							<p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</p> <a href="#" class="link-btn">View this Package</a> </div>
						<div class="tour_rela_1"> <img src="images/related2.png" alt="" />
							<h4>Mauritius 4Days / 3Nights</h4>
							<p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</p> <a href="#" class="link-btn">View this Package</a> </div>
						<div class="tour_rela_1"> <img src="images/related3.png" alt="" />
							<h4>India 14Days / 13Nights</h4>
							<p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</p> <a href="#" class="link-btn">View this Package</a> </div>
					</div>
				</div>
			</div>
		</div>
	</section>


@endsection
