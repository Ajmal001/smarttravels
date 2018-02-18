@extends('frontend.app')

@section('title', 'Invoice')

@section('body')

<style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
       
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
</style>




    
	
   
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
					<h4>Invoice </h4>
								

					<div class="db-2-main-com db-2-main-com-table">
					
						
						   <div class="invoice-box">
								<table cellpadding="0" cellspacing="0">
									<tr class="top">
										<td colspan="2">
											<table>
												<tr>
													<td class="title">
													  
													</td>
													
													<td>
													   
														<?php echo date("l jS \of F Y"); ?><br>
														<strong>Name:</strong> {{$v_name}}<br>                               
														<strong>Email:</strong> {{$v_email}}<br>                               
														<strong>Country:</strong> {{$v_country}}<br>                               
														<strong>Location:</strong> {{$v_location}}<br>                               
														<strong>Person:</strong> Adult = {{$v_person_adult}}  Child = {{$v_person_child}}  Infant = {{$v_person_infant}} <br>                               
														<strong>Duration:</strong> {{$v_duration}} Days {{$v_duration_night}} Nights <br>                               
													</td>
												</tr>
											</table>
										</td>
									</tr>
									
									<tr class="information">
										<td colspan="2">
											<table>
												<tr>
													<td>
													   
													</td>
													
													<td>
														
													</td>
												</tr>
											</table>
										</td>
									</tr> 
									
								   
									
									<tr class="heading">
										<td>
										   <strong>Item </strong> 
										</td>
										
										<td>
											Price
										</td>
									</tr>
									
									<tr class="heading">
										<td>
											<strong>Air Ticket</strong><br>
											
											Adult:  {{$air_ticket_price_adult}}<br> 
											Child:   {{$air_ticket_price_child}}<br>
											Infant: {{$air_ticket_price_infant}} <br> 
										</td>
										
										<td>
											{{$air_ticket_price_total}}
										</td>
									</tr>
									
									<tr class="heading">
										<td>
											 <strong>Hotel Price</strong><br>
											{{$hotel_price}} (Per Night * {{$v_hotel_room}} Room) <br>							
										</td>
									   
										<td>
											{{$total_hotel_price}}
										</td>
									</tr>
									
									<tr class="heading">
										<td>
											 <strong>Food Price</strong><br>
											<?php 
												if(isset($v_food_type_lunch) and !isset($v_food_type_dinner)){
													echo "Lunch ";
												}
												if(isset($v_food_type_dinner) and !isset($v_food_type_lunch)){
													echo " Dinner";
												}
												if(isset($v_food_type_dinner) and isset($v_food_type_lunch)){
													echo "Lunch + Dinner";
												}
												if(!isset($v_food_type_dinner) and !isset($v_food_type_lunch)){
													echo " No Food Selected";
												}
											?>		
											: {{$food_price}}
										</td>
										
										<td>
											{{$total_food_price}}
										</td>
									</tr>
									
									<tr class="heading">
										<td>
											 <strong>Sight Seeing</strong><br>
											<?php 
												if(isset($v_sights)){
												foreach($v_sights_list as $v_sight){
												echo $v_sight->name ." : ". $v_sight->price."<br>";
													}
												}
											?>
											
										</td>
										
										<td>
											{{$total_sights_price}}
										</td>
									</tr>								
									
									
									<tr class="heading">
										<td>
											<strong>Transfer Price</strong><br>
											{{$transfer_price_single}} (Per Ride)
										</td>
										
										<td>
											{{$transfer_price}} 
										</td>
									</tr>
									
									<tr class="total">
										<td></td>
										
										<td>
										   Total: {{$total}}
										  
										</td>
									</tr>
								</table>
						</div>
					</div>

				</div>
			</div>
			
			
			
		
			
		</div>
	</section>
	<!--END DASHBOARD-->
	</div>
	
	


   @endsection