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



			<!--CENTER SECTION-->
			<!--CENTER SECTION-->
			<div class="db-2">
				<div class="db-2-com db-2-main">
					<h4>Create A Tour Plan </h4>
					<div class="db-2-main-com db-2-main-com-table">



						{!! Form::open(['url' => 'usertouroperatorcostsave']) !!}
						<table class="responsive-table">
							<tbody>
								<tr>
									<td>Name</td>
									<td><input type="text" name="v_name" style="width:70%;border: 1px solid #c9c9c9; height:30px;" Placeholder=" Enter Visitor Name" required></td>
								</tr>
								<tr>
									<td>Email</td>
									<td><input type="email" name="v_email" style="width:70%;border: 1px solid #c9c9c9; height:30px;" Placeholder=" Enter Visitor Email"></td>
								</tr>


                <tr>
									<td>Select Country</td>
									<td>
									   <select name="v_country" id="country">
										  <option  disabled selected value="0">Select Country</option>
                      @foreach($countryList as $cl)
                          <option value="{{$cl->country_id}}">{{$cl->country_name}}</option>
                      @endforeach
										</select>
									</td>
								</tr>


                <tr>
									<td>Select Location</td>
									<td id="testid">
                    <select name="v_location" class="v_location">
											<option value="0" disabled="true" selected="true">Select Location</option>
										  @foreach($locationList as $ll)
												<option value="{{$ll->location_id}}">{{$ll->location_name}}</option>
											@endforeach
                    </select>
									</td>
								</tr>








								<tr>
									<td>Person</td>
									<td>
										<input type="text" style="width:31%" name="v_person_adult" Placeholder="Adult" />
										<input type="text" style="width:31%" name="v_person_child" Placeholder="Child" />
										<input type="text" style="width:31%" name="v_person_infant" Placeholder="Infant" />
									</td>
								</tr>


								<tr>
									<td>Duration</td>
									<td><input type="text" style="width:40%" name="v_duration" Placeholder="Enter Duration" /></td>
								</tr>

								<tr>
									<td>Air Ticket</td>
									<td>
									   <select name="v_air_ticket_type">
										  <option  disabled selected value="0">Select Ticket Type</option>
										  <option value="arrival">Arrival</option>
										  <option value="return">Return</option>

										</select>

									</td>
								</tr>

								<tr>
									<td>No of Hotel Room</td>
									<td><input type="text" style="width:40%" name="v_hotel_room" Placeholder="Enter Number of Hotel Room" /></td>
								</tr>

								<tr>
									<td>Hotel Rating</td>
									<td>

									 <select name="v_hotel_rating">
										<option value="0" disabled selected>Select Rating</option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
									</select>

									</td>
								</tr>

								<tr>
									<td>Sights</td>
									<td>
									    <select name="v_sights[]" style="width:200px;"  multiple="multiple">
											<option value="0" disabled selected>Select Sights</option>
											@foreach($sightList as $sights)
											<option>{{$sights->name}}</option>
											@endforeach
										</select>
									</td>
								</tr>

								<tr>
									<td>Food</td>
									<td>

										<div class="checkbox checkbox-info checkbox-circle">
												<input id="chp53" class="styled" name="v_food_type_lunch" value="3000" type="checkbox">
												<label for="chp53" style="font-size:15px;margin-right:30px;"> Lunch </label>
												<input id="chp54" class="styled" name="v_food_type_dinner" value="3000" type="checkbox">
												<label for="chp54" style="font-size:15px"> Dinner </label>
										</div>

									</td>
								</tr>

								<tr>
									<td>Transfer</td>
									<td>

										<div class="checkbox checkbox-info checkbox-circle">
											<input id="chp55" class="styled" name="v_transfer_type_pic" value="3000" type="checkbox">
											<label for="chp55" style="font-size:15px;margin-right:30px;"> Pick </label>
											<input id="chp56" class="styled" name="v_transfer_type_drop" value="3000" type="checkbox">
											<label for="chp56" style="font-size:15px"> Drop </label>
										</div>

									</td>
								</tr>

								<tr>
								    <td>
									     <input type="submit" class="waves-effect waves-light btn-large" value="Get The Cost" />
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




		</div>
	</section>
	<!--END DASHBOARD-->
	</div>

	  </div> <!--END Vue App-->




   @endsection
