@extends('frontend.app')

@section('title', 'Visa')

@section('body')

<style>
[class~="form"] {
    background: none;
 }
</style>
	<!--====== QUICK ENQUIRY FORM ==========-->
	<section>
		<div class="form form-spac rows">
			<div class="container">
				<!-- TITLE & DESCRIPTION -->
				<div class="spe-title col-md-12">
					<h2>Visa <span>Application</span></h2>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>
				</div>
				
				<!--====== COMMON NOTICE ==========-->
				<div class="col-md-6 col-sm-6 col-xs-12 wow fadeInRight" data-wow-duration="1s">
					<div class="rows book_poly">
						<h3>{{$s_country}} Travel Visa Requirements </h3>
						
						@if(isset($visaRequirement))
							{!!$visaRequirement->requirements!!}
					    @else
						    No Record Found For <strong>{{$s_country}}</strong>
						@endif
					</div>
				</div>
				
				<div class="col-md-6 col-sm-6 col-xs-12 form_1 wow fadeInLeft" data-wow-duration="1s">
					<!--====== THANK YOU MESSAGE ==========-->
					
					
					{!! Form::open(['url' => 'visaapplicationsave','class'=>'col s12','enctype'=>'multipart/form-data']) !!}	
						<ul>
							<li>
								<input type="text" name="first_name" value="" id="ename" placeholder="First Name" required> 
							</li>
							<li>
								<input type="text" name="last_name" value="" id="ename" placeholder="Last Name"> 
							</li>
							<li>
								<input type="email" name="email" value="" id="eemail" placeholder="Email id" required> 
							</li>
							<li>
								<input type="text" name="mobile" value="" id="ename" placeholder="Mobile" required> 
							</li>
							
							<li>
								<input type="text" name="profession" value="" id="ename" placeholder="Profession" required> 
							</li>
							
							<li>
								<input type="text" name="company" value="" id="ename" placeholder="Company" > 
							</li>
							
							<li>
								<input type="text" name="address" value="" id="ecity" placeholder="Address" required> 
							</li>
							
							<li>
								<input type="text" name="passport_no" value=""  placeholder="Passport No" required> 
							</li>
							
							<li>
								<input type="text" name="arrival_date" value="" id="from" placeholder="Arrival Date" required> 
							</li>
							
							<li>
								<h4>Applicant Image</h4>
							</li>
							
							<li>
								<input type="file" name="image_user" value=""> 
							</li>
							
							<li>
								<h4>Passport Image</h4>
							</li>
							
							<li>
								<input type="file" name="image_passport" value=""> 
							</li>
							
							<input type="hidden" name="country" value="{{$s_country}}" > 
							<li>
								<input type="submit" value="Submit" id="send_button"> 
							</li>
						</ul>
					{!! Form::close() !!}
				</div>
				
			</div>
		</div>
	</section>
	
 @endsection