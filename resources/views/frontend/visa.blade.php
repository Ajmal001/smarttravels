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
					@if ($errors->any())
							@foreach ($errors->all() as $error)
								<span style="color:red">{{ $error }}</span>
							@endforeach
					@endif	
														
					@if(Session::has('flash_message_insert'))
						<span style="color:green">{{ Session::get('flash_message_insert') }}</span>
					@elseif(Session::has('flash_message_update'))
						<span style="color:green">{{ Session::get('flash_message_update') }}</span>
					@elseif(Session::has('flash_message_delete'))
						<span style="color:red">{{ Session::get('flash_message_delete') }}</span>
					@endif 	
				
				</div>
				
				<!--====== COMMON NOTICE ==========-->
				
				
				<div class="col-md-12 col-sm-6 col-xs-12 form_1 wow fadeInLeft" data-wow-duration="1s">
					<!--====== THANK YOU MESSAGE ==========-->
					<div class="succ_mess">Thank you for contacting us we will get back to you soon.</div>
					{!! Form::open(['url' => 'visaapply','class'=>'col s12']) !!}	
						<ul>
							<li>
								<input type="text" name="s_country" style="border:1px solid black;" id="select-city" class="autocomplete" placeholder="Enter Country Name" required> 
							</li>						
							
							
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