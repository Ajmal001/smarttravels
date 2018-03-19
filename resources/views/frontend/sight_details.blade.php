@extends('frontend.app')

@section('title', 'Sight Details')

@section('body')


<style>
.inner_banner{
background-image: url("{{ URL::to('/') }}/public/backendimages/{{$sightDetails->image}}");
}
</style>

	<section>
		<div class="rows inner_banner">
			<div class="container">
				<h2><span>{{$sightDetails->name}} -</span> {{$sightDetails->location}}</h2>
				<ul>
					<li><a href="{{ URL::to('/') }}">Home</a>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
					<li>{{$sightDetails->name}}
					</li>
				</ul>
				<p>Country: {{$sightDetails->country}}</p>
			</div>
		</div>
	</section>
	<!--====== TOUR DETAILS - BOOKING ==========-->
	<section>
		<div class="rows banner_book" id="inner-page-title">
			<div class="container">
				<div class="banner_book_1">
					<ul>
						<li class="dl1">Location : {{$sightDetails->location}}</li>
						<li class="dl2">Price : {{$sightDetails->price}}Tk</li>
						<li class="dl3">Duration : {{$sightDetails->sku}}</li>
						<li class="dl4"><a href="{{ URL::to('/sightbooking/')}}/{{$sightDetails->sight_id }}">Book Now</a> </li>
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
						<h2>{{$sightDetails->name}}</h2> </div>
					<!--====== TOUR DESCRIPTION ==========-->
					<div class="tour_head1">
						<h3>Description</h3>
						<p>{!!{!!$sightDetails->details!!}</p>
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
							</h4> <a href="booking.html" class="link-btn">Book Now</a> </div>
					<!--====== TRIP INFORMATION ==========-->
					<div class="tour_right tour_incl tour-ri-com">
						<h3>Trip Information</h3>
						<ul>
							<li>Location : {{$sightDetails->location}}</li>
							<li>Arrival Date: {{$sightDetails->arrival_date}}</li>
							<li>Departure Date: {{$sightDetails->departure_date}}</li>
							<li>{{$sightDetails->main_package}}</li>
						</ul>
					</div>
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