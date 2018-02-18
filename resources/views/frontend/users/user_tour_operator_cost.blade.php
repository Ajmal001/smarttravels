@extends('frontend.app')

@section('title', 'Single Country Package')

@section('body')

	<div id="app">

	<!--DASHBOARD-->
	<section>
		<div class="db">
			<!--LEFT SECTION-->
			<div class="db-l">
				<div class="db-l-1">
					<ul>
						<li><img src="{{ URL::to('/') }}/public/backendimages/db-profile.jpg" alt="" />
						</li>

					</ul>
				</div>
				<div class="db-l-2">
					<ul>
						<li>
							<a href="dashboard.html"><img src="{{ URL::to('/') }}/assets/frontend/images/icon/dbl1.png" alt="" /> All Bookings</a>
						</li>
						<li>
							<a href="{{url('/usertouroperatorcost')}}"><img src="{{ URL::to('/') }}/assets/frontend/images/icon/dbl2.png" alt="" /> Single Country Tour</a>
						</li>
						<li>
							<a href="{{url('/usertouroperatorcostmultiple')}}"><img src="{{ URL::to('/') }}/assets/frontend/images/icon/dbl2.png" alt="" /> Multiple Country Tour</a>
						</li>
						<li>
							<a href="db-hotel-booking.html"><img src="{{ URL::to('/') }}/assets/frontend/images/icon/dbl3.png" alt="" /> Hotel Bookings</a>
						</li>
						<li>
							<a href="db-event-booking.html"><img src="{{ URL::to('/') }}/assets/frontend/images/icon/dbl4.png" alt="" /> Event Bookings</a>
						</li>
						<li>
							<a href="db-my-profile.html"><img src="{{ URL::to('/') }}/assets/frontend/images/icon/dbl6.png" alt="" /> My Profile</a>
						</li>
						<li>
							<a href="db-all-payment.html"><img src="{{ URL::to('/') }}/assets/frontend/images/icon/dbl9.png" alt="" /> Payments</a>
						</li>
						<li>
							<a href="db-refund.html"><img src="{{ URL::to('/') }}/assets/frontend/images/icon/dbl7.png" alt="" /> Claim & Refund</a>
						</li>
					</ul>
				</div>
			</div>

<style>
label{
font-size: 15px;
}

</style>

			<!--CENTER SECTION-->
			<!--CENTER SECTION-->
			<div class="db-2">
				<div class="db-2-com db-2-main">
					<h4>Create A Tour Plan </h4>
					<div class="db-2-main-com db-2-main-com-table">

						{!! Form::open(['url' => 'usertouroperatorcostsave']) !!}

						<div class="form-group">
						   <select name="v_country" id="country">

								    <option  disabled selected value="0">Select Country</option>
										@foreach($countryList as $cl)
										<option value="{{$cl->country_id}}">{{$cl->country_name}}</option>
										@endforeach
							</select>
					  </div>

					  <div class="form-group">
					    <label for="location">Select Location</label>
							<select name="v_location" class="v_location">
								

							</select>
					  </div>

					  <button type="submit" class="btn btn-default">Submit</button>``

						{!! Form::close() !!}

						<div class="db-mak-pay-bot">

						</div>
					</div>

				</div>
			</div>
			<!--RIGHT SECTION-->




		</div>
	</section>
	<!--END DASHBOARD-->
	</div>

	  </div> <!--END Vue App-->




   @endsection
