@extends('frontend.app')

@section('title', 'About')

@section('body')


<style>
.inner_banner{
background-image: url("{{ URL::to('/') }}/public/backendimages/{{$attractionDetails->image}}");
}
</style>

	<section>
		<div class="rows inner_banner">
			<div class="container">
				<h2><span>{{$attractionDetails->name}} -</span> {{$attractionDetails->location}}</h2>
				<ul>
					<li><a href="{{ URL::to('/') }}">Home</a>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
					<li>{{$attractionDetails->name}}
					</li>
				</ul>
				<p>Country: {{$attractionDetails->country}}</p>
			</div>
		</div>
	</section>
	<!--====== TOUR DETAILS - BOOKING ==========-->
	<section>
		<div class="rows banner_book" id="inner-page-title">
			<div class="container">
				<div class="banner_book_1">
					<ul>
						<li class="dl1">Location : {{$attractionDetails->location}}</li>
						<li class="dl2">
							Price : {{$attractionDetails->price}}
							@if($optionscurrency)
								{{$optionscurrency->currency}}
							@endif
						</li>
						<li class="dl3">SKU : {{$attractionDetails->sku}}</li>
						<li class="dl4"><a href="{{ URL::to('/attractionbooking/')}}/{{$attractionDetails->id }}">Book Now</a> </li>
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
						<h2>{{$attractionDetails->name}}</h2> </div>
					<!--====== TOUR DESCRIPTION ==========-->
					<div class="tour_head1">
						<h3>Description</h3>
						<p>{!!$attractionDetails->details!!}</p>
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
						<h3>Popular Attractions</h3>
						@foreach($attractionLatest as $attraction)
						<div class="tour_rela_1">
							<h3>{{$attraction->name}}</h3>
							<img src="{{URL('/')}}/public/backendimages/{{$attraction->image}}" alt="{{$attraction->name}}" />
							<h4>{{$attraction->location}}, {{$attraction->country}}</h4>
							<p>{!! $attraction->details !!}</p>
							<a href="{{URL('/')}}/attractiondetails/{{$attraction->id}}" class="link-btn">View this Package</a>
						</div>
						<hr style="margin:0;">
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>

  @endsection
