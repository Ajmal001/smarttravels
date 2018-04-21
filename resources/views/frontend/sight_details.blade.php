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
						<li class="dl2">
							Price : {{$sightDetails->price}}
							@if($optionscurrency)
								{{$optionscurrency->currency}}
							@endif
						</li>
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
						<p>{!!$sightDetails->details!!}</p>
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
						<h3>Popular Sights</h3>
						@foreach($sightLatest as $sight)
						<div class="tour_rela_1">
							<h3>{{$sight->name}}</h3>
							<img src="{{URL('/')}}/public/backendimages/{{$sight->image}}" alt="{{$sight->name}}" />
							<h4>{{$sight->location}}, {{$sight->country}}</h4>
							<p>{!! $sight->details !!}</p>
							<a href="{{URL('/')}}/sightdetails/{{$sight->sight_id}}" class="link-btn">View Details</a>
						</div>
						<hr style="margin:0;">
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>

  @endsection
