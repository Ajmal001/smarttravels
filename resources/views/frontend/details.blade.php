@extends('frontend.app')

@section('title', 'Tour Package')

@section('body')


<style>
.inner_banner{
background-image: url("{{ URL::to('/') }}/public/backendimages/{{$packageDetails->tour_image}}");
}
</style>

	<section>
		<div class="rows inner_banner">
			<div class="container">
				<h2><span>{{$packageDetails->package_name}} -</span> {{$packageDetails->general_package}}</h2>
				<ul>
					<li><a href="{{ URL::to('/') }}">Home</a>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
					<li>{{$packageDetails->package_name}}
					</li>
				</ul>
				<p>Country: {{$packageDetails->country}}</p>
			</div>
		</div>
	</section>
	<!--====== TOUR DETAILS - BOOKING ==========-->
	<section>
		<div class="rows banner_book" id="inner-page-title">
			<div class="container">
				<div class="banner_book_1">
					<ul>
						<li class="dl1">Location : {{$packageDetails->location}}</li>
						<li class="dl2">
							Price : {{$packageDetails->price}}
							@if($optionscurrency)
								{{$optionscurrency->currency}}
							@endif
						</li>
						<li class="dl3">Duration : {{$packageDetails->duration}}</li>
						<li class="dl4"><a href="{{ URL::to('/tourbooking/')}}/{{$packageDetails->package_id }}">Book Now</a> </li>
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
						<h2>{{$packageDetails->package_name}}</h2> </div>
					<!--====== TOUR DESCRIPTION ==========-->
					<div class="tour_head1">
						<h3>Description</h3>
						<p>{!!$packageDetails->tour_details!!}</p>
					</div>



					<!--====== TOUR Excluded==========-->
					<div class="tour_head1 hot-ameni">
						<h3>Tour Exclude</h3>
						<ul>
							<?php $tour_exclude = explode(',',$packageDetails->tour_exclude); ?>
							@foreach($tour_exclude as $te)
							<li><i class="fa fa-check" aria-hidden="true"></i> {{$te}} </li>
							@endforeach
						</ul>
					</div>

					<!--====== TOUR Included  ==========-->
					<div class="tour_head1 hot-ameni">
						<h3>Tour Include</h3>
						<ul>
							<?php $tour_included = explode(',',$packageDetails->tour_include); ?>
							@foreach($tour_included as $ti)
							<li class="event-res"><i class="fa fa-check" aria-hidden="true"></i>{{$ti}}</li>
							@endforeach
						</ul>
					</div>


				</div>
				<div class="col-md-3 tour_r">
					<!--====== TRIP INFORMATION ==========-->
					<div class="tour_right tour_incl tour-ri-com">
						<h3>Trip Information</h3>
						<ul>
							<li>Location : {{$packageDetails->location}}</li>
							<li>Arrival Date: {{$packageDetails->arrival_date}}</li>
							<li>Departure Date: {{$packageDetails->departure_date}}</li>
							<li>{{$packageDetails->main_package}}</li>
						</ul>
					</div>

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
						@foreach($tourLatest as $tour)
						<div class="tour_rela_1">
							<h3>{{$tour->package_name}}</h3>
							<img src="{{URL('/')}}/public/backendimages/{{$tour->tour_image}}" alt="{{$tour->package_name}}" />
							<h4>{{$tour->duration}}</h4>
							<p>{!! $tour->tour_details !!}</p>
							<a href="{{URL('/')}}/tourdetails/{{$tour->package_id}}" class="link-btn">View this Package</a>
						</div>
						<hr style="margin:0;">
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>

  @endsection
