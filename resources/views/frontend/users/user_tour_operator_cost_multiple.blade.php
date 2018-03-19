@extends('frontend.app')

@section('title', 'Multiple Country Package')

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
					<h4>Create A Tour Plan For Multiple Country </h4>
					<div class="db-2-main-com db-2-main-com-table">					
						
						{!! Form::open(['url' => 'usertouroperatorcostmultiplesave']) !!}	
						<table class="responsive-table">
							<tbody>
								<tr>
									<td>Name</td>
									<td><input type="text" style="width:40%" name="v_name" Placeholder="Enter Name"/></td>
								</tr>
								
								<tr>
									<td>Email</td>
									<td><input type="text" style="width:40%" name="v_email" Placeholder="Enter Email" /></td>
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
									<td>Total Air Ticket Cost </td>									
									<td><input type="text" style="width:40%" name="v_air_ticket_cost" Placeholder="Enter Air Ticket Cost" /></td>
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
									<td>No of Hotel Room</td>
									<td><input type="text" style="width:40%" name="v_hotel_room" Placeholder="Enter Email" /></td>
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
											<label for="chp55" style="font-size:15px;margin-right:30px;"> Pic </label>
											<input id="chp56" class="styled" name="v_transfer_type_drop" value="3000" type="checkbox">
											<label for="chp56" style="font-size:15px"> Drop </label>
										</div>
										
									</td>
								</tr>	
										
							</tbody>
						</table>
						
						<h4>Country No 1</h4>
						
						<table class="responsive-table">
							<tbody>
							    <tr>
									<td>Country</td>
									<td><input type="text" name="v_country1" style="width:70%;border: 1px solid #c9c9c9; height:30px;" Placeholder="Enter Country Name" id="select-city" class="autocomplete" required></td>
								</tr>
								<tr>
									<td>Base Location</td>
									<td>
									    <select name="v_location1" style="width:200px;">
											<option value="0" disabled selected>Select Location</option>
											@foreach($locationList as $location)
											<option>{{$location->location_name}}</option>
											@endforeach
										 </select>
									</td>
								</tr>								
								
								<tr>
									<td>Duration</td>
									<td><input type="text" style="width:40%" name="v_duration1" Placeholder="Enter Duration" /></td>
								</tr>
								
								<tr>
									<td>Sights</td>
									<td>
									    <select name="v_sights1[]" style="width:200px;"  multiple="multiple">
											<option value="0" disabled selected>Select Sights</option>
											@foreach($sightList as $sights)
											<option>{{$sights->name}}</option>
											@endforeach
										</select>
									</td>
								</tr>								
										
							</tbody>
						</table>
						
						<h4>Country No 2</h4>
						
						<table class="responsive-table">
							<tbody>
							    <tr>
									<td>Country</td>
									<td><input type="text" name="v_country2" style="width:70%;border: 1px solid #c9c9c9; height:30px;" Placeholder="Enter Country Name" id="select-city" class="autocomplete"></td>
								</tr>
								<tr>
									<td>Base Location</td>
									<td>
									    <select name="v_location2" style="width:200px;">
											<option value="0" disabled selected>Select Location</option>
											@foreach($locationList as $location)
											<option>{{$location->location_name}}</option>
											@endforeach
										 </select>
									</td>
								</tr>
								
								
								<tr>
									<td>Duration</td>
									<td><input type="text" style="width:40%" name="v_duration2" Placeholder="Enter Duration" /></td>
								</tr>
								
								<tr>
									<td>Sights</td>
									<td>
									    <select name="v_sights2[]" style="width:200px;"  multiple="multiple">
											<option value="0" disabled selected>Select Sights</option>
											@foreach($sightList as $sights)
											<option>{{$sights->name}}</option>
											@endforeach
										</select>
									</td>
								</tr>								
										
							</tbody>
						</table>
						
						<h4>Country No 3</h4>
						
						<table class="responsive-table">
							<tbody>
							    <tr>
									<td>Country</td>
									<td><input type="text" name="v_country3" style="width:70%;border: 1px solid #c9c9c9; height:30px;" Placeholder="Enter Country Name" id="select-city" class="autocomplete"></td>
								</tr>
								<tr>
									<td>Base Location</td>
									<td>
									    <select name="v_location3" style="width:200px;">
											<option value="0" disabled selected>Select Location</option>
											@foreach($locationList as $location)
											<option>{{$location->location_name}}</option>
											@endforeach
										 </select>
									</td>
								</tr>
								
								
								<tr>
									<td>Duration</td>
									<td><input type="text" style="width:40%" name="v_duration3" Placeholder="Enter Duration" /></td>
								</tr>
								
								<tr>
									<td>Sights</td>
									<td>
									    <select name="v_sights3[]" style="width:200px;"  multiple="multiple">
											<option value="0" disabled selected>Select Sights</option>
											@foreach($sightList as $sights)
											<option>{{$sights->name}}</option>
											@endforeach
										</select>
									</td>
								</tr>								
										
							</tbody>
						</table>
						
						<h4>Country No 4</h4>
						
						<table class="responsive-table">
							<tbody>
							    <tr>
									<td>Country</td>
									<td><input type="text" name="v_country4" style="width:70%;border: 1px solid #c9c9c9; height:30px;" Placeholder="Enter Country Name" id="select-city" class="autocomplete"></td>
								</tr>
								<tr>
									<td>Base Location</td>
									<td>
									    <select name="v_location4" style="width:200px;">
											<option value="0" disabled selected>Select Location</option>
											@foreach($locationList as $location)
											<option>{{$location->location_name}}</option>
											@endforeach
										 </select>
									</td>
								</tr>
								
								
								<tr>
									<td>Duration</td>
									<td><input type="text" style="width:40%" name="v_duration4" Placeholder="Enter Duration" /></td>
								</tr>
								
								<tr>
									<td>Sights</td>
									<td>
									    <select name="v_sights4[]" style="width:200px;"  multiple="multiple">
											<option value="0" disabled selected>Select Sights</option>
											@foreach($sightList as $sights)
											<option>{{$sights->name}}</option>
											@endforeach
										</select>
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