@extends('frontend.app')

@section('title', 'Hotels')

@section('body')
	<!--====== HOTELS LIST ==========-->
	<section class="hot-page2-alp hot-page2-pa-sp-top">
		<div class="container">
			<div class="row inner_banner inner_banner_3 bg-none">
				<div class="hot-page2-alp-tit">
					<h1>Hotel Search Result : {{$s_ratings}} Star Rating Hotels</h1>
					<ul>
						<li><a href="{{url('/')}}>Home</a> </li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
						<li><a href="#" class="bread-acti">Hotels & Restaurants</a> </li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="hot-page2-alp-con">
					<!--LEFT LISTINGS-->
					<div class="col-md-3 hot-page2-alp-con-left">
						<!--PART 1 : LEFT LISTINGS-->
						<div class="hot-page2-alp-con-left-1">
							<h3>Search Hotels</h3>
						</div>

						    @include('frontend.hotels.hotel_location_search_form')

							@include('frontend.hotels.hotel_price_search_form')

							@include('frontend.hotels.hotel_star_search_form')

					</div>
					<!--END LEFT LISTINGS-->
					<!--RIGHT LISTINGS-->
					<div class="col-md-9 hot-page2-alp-con-right">
						<div class="hot-page2-alp-con-right-1">
							<!--LISTINGS-->
							<div class="row">

								@foreach($hotelRatingList as $hotel)
								<!--LISTINGS START-->
								<div class="hot-page2-alp-r-list">
									<div class="col-md-3 hot-page2-alp-r-list-re-sp">
										<a href="javascript:void(0);">
											<div class="hotel-list-score">{{$hotel->hotel_rating}}</div>
											<div class="hot-page2-hli-1"> <a href="hoteldetails/{{$hotel->hotel_id}}"><img src="{{ URL::to('/') }}/public/backendimages/{{$hotel->hotel_image}}" alt=""> </a></div>
											<div class="hom-hot-av-tic hom-hot-av-tic-list"> {{$hotel->hotel_country}} </div>
										</a>
									</div>
									<div class="col-md-6">
										<div class="hot-page2-alp-ri-p2"> <a href="hoteldetails/{{$hotel->hotel_id}}"><h3>{{$hotel->hotel_name}}</h3></a>
											<ul>
												<li>{{$hotel->hotel_location}}</li><br><br>
												<p>{{$hotel->hotel_address}}</p>
											</ul>
										</div>
									</div>
									<div class="col-md-3">
										<div class="hot-page2-alp-ri-p3">
											<span class="hot-list-p3-1">Price Per Night</span> <span class="hot-list-p3-2">{{$hotel->hotel_price}}Tk</span><span class="hot-list-p3-4">
												<a href="hotelbooking/{{$hotel->hotel_id}}" class="hot-page2-alp-quot-btn">Book Now</a>
											</span> </div>
									</div>
								</div>
								<!--END LISTINGS-->
								@endforeach
							</div>
						</div>
					</div>
					<!--END RIGHT LISTINGS-->
				</div>
			</div>
		</div>
	</section>


	@endsection
