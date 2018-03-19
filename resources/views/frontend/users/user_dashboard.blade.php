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
					<h4>Manage Booking</h4>
					<div class="db-2-main-com">
						<div class="db-2-main-1">
							<div class="db-2-main-2"> <img src="{{ URL::to('/') }}/assets/frontend/images/icon/db2.png" alt="" /><span>Travel Bookings</span>
								<ul>
									<li><a href="db-travel-details.html">Honeymoon Package</a>
									</li>
									<li><a href="db-payment.html">Payment Status <span class="db-done">Done</span></a>
									</li>
									<li><a href="db-travel-details.html">Remaining Days - 14</a>
									</li>
									<li><a href="db-travel-details.html">Travel Date - 16 may 2018</a>
									</li>
									<li><a href="db-refund.html">Cancel this booking</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="db-2-main-1">
							<div class="db-2-main-2"> <img src="{{ URL::to('/') }}/assets/frontend/images/icon/db3.png" alt="" /><span>Hotel Bookings</span>
								<ul>
									<li><a href="db-hotel-details.html">GTC Grand Chola</a>
									</li>
									<li><a href="db-payment.html">Payment Status <span class="db-not-done">not-Done</span></a>
									</li>
									<li><a href="db-hotel-details.html">Remaining Days - 14</a>
									</li>
									<li><a href="db-hotel-details.html">Travel Date - 16 may 2018</a>
									</li>
									<li><a href="db-refund.html">Cancel this booking</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="db-2-main-1">
							<div class="db-2-main-2"> <img src="{{ URL::to('/') }}/assets/frontend/images/icon/db1.png" alt="" /><span>Event Bookings</span>
								<ul>
									<li><a href="db-event-details.html">Eiffel Tower Party</a>
									</li>
									<li><a href="db-payment.html">Payment Status <span class="db-not-done">not-Done</span></a>
									</li>
									<li><a href="db-event-details.html">Remaining Days - 14</a>
									</li>
									<li><a href="db-event-details.html">Travel Date - 16 may 2018</a>
									</li>
									<li><a href="db-refund.html">Cancel this booking</a>
									</li>
								</ul>
							</div>
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