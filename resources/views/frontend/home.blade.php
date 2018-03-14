@extends('frontend.app')

@section('title', 'Smart Travel')

@section('body')

<!--====== BANNER ==========-->
	<!-- SECTION: HEADER -->
	<!--HEADER SECTION-->
	<section>
		<div class="v2-hom-search">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
					<div class="">

					    {!! Form::open(['url' => 'toursearch','class'=>'v2-search-form']) !!}
							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="s_country" id="select-city" class="autocomplete" required>
									<label for="select-city">Select Country</label>


								</div>
								<div class="input-field col s12">
									<select name="s_package">
										<option value="" disabled selected>Select your package</option>
										<option>In Bound Package</option>
										<option>Out Bound Package</option>
										<option>Special Package</option>
										<option>Domestic Package</option>
										<option>Family Package</option>
										<option>Honeymoon Package</option>
										<option>Single Package</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									<input type="text" id="from" name="s_arrival_date" required>
									<label for="from">Arrival Date</label>
								</div>
								<div class="input-field col s6">
									<input type="text" id="to" name="s_departure_date" required>
									<label for="to">Departure Date</label>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s6">
									<select name="s_min_price">
										<option value="100" >Min Price</option>
										<option value="2000">2000</option>
										<option value="5000">5000</option>
										<option value="10000">10000</option>
										<option value="50000">50000</option>
										<option value="100000">100000</option>
										<option value="500000">500000</option>
									</select>
								</div>
								<div class="input-field col s6">
									<select name="s_max_price">
										<option value="50000000" >Max Price</option>
										<option value="2000">2000</option>
										<option value="5000">5000</option>
										<option value="10000">10000</option>
										<option value="50000">50000</option>
										<option value="100000">100000</option>
										<option value="500000">500000</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="submit" value="search" class="waves-effect waves-light tourz-sear-btn v2-ser-btn">
								</div>
							</div>
						{!! Form::close() !!}
					</div>
					</div>
					<div class="col-md-6">
					<div class="v2-ho-se-ri">
						<h1>Tour Package booking Now</h1>
						<p>Experience the various exciting tour and travel packages and Make hotel reservations, find vacation packages, search cheap hotels and events</p>
						<div class="tourz-hom-ser v2-hom-ser">
							<ul>
								<li>
									<a href="{{url('/tourpackages')}}" class="waves-effect waves-light btn-large tourz-pop-ser-btn"><img src="{{URL::asset('assets/frontend/images/icon/2.png')}}" alt=""> Tour</a>
								</li>
								<li>
									<a href="{{url('/airticketbooking')}}" class="waves-effect waves-light btn-large tourz-pop-ser-btn"><img src="{{URL::asset('assets/frontend/images/icon/31.png')}}" alt=""> Air Ticket</a>
								</li>
								<li>
									<a href="{{url('/transfer')}}" class="waves-effect waves-light btn-large tourz-pop-ser-btn"><img src="{{URL::asset('assets/frontend/images/icon/30.png')}}" alt=""> Transfer </a>
								</li>
								<li>
									<a href="{{url('/hotels')}}" class="waves-effect waves-light btn-large tourz-pop-ser-btn"><img src="{{URL::asset('assets/frontend/images/icon/1.png')}}" alt=""> Hotel</a>
								</li>
							</ul>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!--====== HOME PLACES ==========-->
	<section>
		<div class="rows pad-bot-redu tb-space">
			<div class="container">
				<!-- TITLE & DESCRIPTION -->
				<div class="spe-title">
					<h2>Top <span>Tour Packages</span></h2>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide.</p>
				</div>
				<div>

					@foreach($tour_packages as $tp)
					<!-- TOUR PLACE 1 -->
					<a href="tourdetails/{{$tp->package_id}}">
					<div class="col-md-4 col-sm-6 col-xs-12 b_packages">
						<!-- OFFER BRAND -->
						<div class="band"> <img src="images/band.png" alt="" /> </div>
						<!-- IMAGE -->
						<div class="v_place_img"> <img src="{{ URL::to('/') }}/public/backendimages/{{$tp->tour_image}}" alt="Tour Booking" title="Tour Booking" /> </div>
						<!-- TOUR TITLE & ICONS -->
						<div class="b_pack rows">
							<!-- TOUR TITLE -->
							<div class="col-md-9 col-sm-8">
								<h4><a href="tourdetails/{{$tp->package_id}}">{{$tp->package_name}}- <span style="color:red">{{$tp->price}}TK</span></a></h4> </div>
							<!-- TOUR ICONS -->
							<div class="col-md-3 col-sm-4 pack_icon">
								<ul>
									<a href="tourdetails/{{$tp->package_id}}" style="color:green;"> Details</a>

								</ul>
							</div>
						</div>
					</div>
					</a>
					@endforeach
					

					</div>
				</div>
			</div>
		</div>
	</section>


	<section>
		<div class="rows tb-space pad-top-o pad-bot-redu">
			<div class="container">
				<!-- TITLE & DESCRIPTION -->
				<div class="spe-title">
					<h2>Hotels <span>Booking</span> </h2>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>World's leading Hotel Booking website,Over 30,000 Hotel rooms worldwide. Book Hotel rooms and enjoy your holidays with distinctive experience</p>
				</div>

				<div class="to-ho-hotel">

					<!-- HOTEL GRID Start-->
					@foreach($hotels as $hotel)
					<a href="hoteldetails/{{$hotel->hotel_id}}">
					<div class="col-md-4">
						<div class="to-ho-hotel-con">
							<div class="to-ho-hotel-con-1">
								<div class="hot-page2-hli-3"> <img src="{{ URL::to('/') }}/public/backendimages/{{$hotel->hotel_image}}" alt=""> </div>
								<div class="hom-hot-av-tic"> {{$hotel->hotel_country}} </div> <img src="{{ URL::to('/') }}/public/backendimages/{{$hotel->hotel_image}}" alt=""> </div>
							<div class="to-ho-hotel-con-23">
								<div class="to-ho-hotel-con-2"> <a href="hoteldetails/{{$hotel->hotel_id}}"><h4>{{$hotel->hotel_name}}</h4></a> </div>
								<div class="to-ho-hotel-con-3">
									<ul>
										<li>Location: {{$hotel->hotel_location}}
											<div class="dir-rat-star ho-hot-rat-star"> Rating:
												<?php
													$rating = $hotel->hotel_rating;
													for ($x = 1; $x <= $rating; $x++) {
													?>
													<i class="fa fa-star" aria-hidden="true"></i>
												<?php
												}
												?>
											</div>
										</li>
										<li><span class="ho-hot-pri">{{$hotel->hotel_price}}Tk</span> </li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					</a>
					@endforeach
					<!-- HOTEL GRID End -->

				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="rows pla pad-bot-redu tb-space">
			<div class="pla1 p-home container">
				<!-- TITLE & DESCRIPTION -->
				<div class="spe-title spe-title-1">
					<h2>Top <span>Sight Seeing</span> in this month</h2>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>
				</div>

				<div class="popu-places-home">
					@foreach($sights as $sight)
					<div class="col-md-6 col-sm-6 col-xs-12 place">
						<div class="col-md-6 col-sm-12 col-xs-12"> <img src="{{ URL::to('/') }}/public/backendimages/{{$sight->image}}" alt="" /> </div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<h3><span>{{$sight->name}}</span>{{$sight->country}}</h3>
							<p>Location: {{$sight->location}}</p> <a href="sightdetails/{{$sight->sight_id}}" class="link-btn">View Details</a> </div>
					</div>
					@endforeach
				</div>

			</div>
		</div>
	</section>



@endsection
