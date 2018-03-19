@extends('frontend.app')

@section('title', 'User Login')

@section('body')

	<!--DASHBOARD-->
	<section>
		<div class="db">
			<!--LEFT SECTION-->
			<div class="db-l">
				<div class="db-l-1">
					<ul>
						<li><img src="{{ URL::to('/') }}/public/backendimages/db-profile.jpg" alt="" />
						</li>
						<li><span>80%</span> profile compl</li>
						<li><span>18</span> Notifications</li>
					</ul>
				</div>
				<div class="db-l-2">
					<ul>
						<li>
							<a href="dashboard.html"><img src="{{ URL::to('/') }}/assets/frontend/images/icon/dbl1.png" alt="" /> All Bookings</a>
						</li>
						<li>
							<a href="db-travel-booking.html"><img src="{{ URL::to('/') }}/assets/frontend/images/icon/dbl2.png" alt="" /> Travel Bookings</a>
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
			
			<!--CENTER SECTION-->
			<div class="db-2">
				<div class="db-2-com db-2-main">
					<h4>Create A Tour Plan </h4>
					<div class="db-2-main-com db-2-main-com-table" style="height:1200px">
						
						{!! Form::open(['url' => 'usertouroperatoroptions']) !!}	
						<table class="responsive-table" >
							<tbody>
							
								<tr>
									<td>Country</td>
									<td><input type="text" name="country" style="width:70%;border: 1px solid #c9c9c9; height:30px;" Placeholder="Enter Country Name" id="select-city" class="autocomplete" required></td>
								</tr>
								<tr>
									<td>Location</td>
									<td>
									    <select name="location" style="width:200px;">
											<option value="0" disabled selected>Select Location</option>
											@foreach($locationList as $location)
											<option>{{$location->location_name}}</option>
											@endforeach
										 </select>
									</td>
								</tr>
								
								
								<tr>
								    <td>
									     <input type="submit" class="waves-effect waves-light btn-large" />
									</td>
								</tr>
											
										
							</tbody>
						</table>
						{!! Form::close() !!}
						<div class="db-mak-pay-bot">
							
						</div>
					</div>

				</div>
			</div>
			<!--RIGHT SECTION-->
			<div class="db-3">
				<h4>Notifications</h4>
				<ul>
					<li>
						<a href="#!"> <img src="{{ URL::to('/') }}/assets/frontend/images/icon/dbr1.jpg" alt="" />
							<h5>50% Discount Offer</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="{{ URL::to('/') }}/assets/frontend/images/icon/dbr2.jpg" alt="" />
							<h5>paris travel package</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="{{ URL::to('/') }}/assets/frontend/images/icon/dbr3.jpg" alt="" />
							<h5>Group Trip - Available</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="{{ URL::to('/') }}/assets/frontend/images/icon/dbr4.jpg" alt="" />
							<h5>world best travel agency</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="{{ URL::to('/') }}/assets/frontend/images/icon/dbr5.jpg" alt="" />
							<h5>special travel coupons</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="{{ URL::to('/') }}/assets/frontend/images/icon/dbr6.jpg" alt="" />
							<h5>70% Offer 2018</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="{{ URL::to('/') }}/assets/frontend/images/icon/dbr7.jpg" alt="" />
							<h5>Popular Cities</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="{{ URL::to('/') }}/assets/frontend/images/icon/dbr8.jpg" alt="" />
							<h5>variations of passages</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</section>
	<!--END DASHBOARD-->
	
	
   @endsection