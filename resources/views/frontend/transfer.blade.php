@extends('frontend.app')

@section('title', 'Transfer')

@section('body')

<style>
.tr-register{
	background-image:url("{{ URL::to('/') }}/public/backendimages/vehic.jpg");
}
</style>

	<section>
		<div class="tr-register">
			<div class="tr-regi-form">
				<h4><span>Transfer</span> </h4>
				<h3>Pic Form </h3>
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
				
					{!! Form::open(['url' => 'inserttransfer','class'=>'col s12']) !!}				
					
					<input type="hidden" name="transfer_id" value="<?php echo strtotime("now"); ?>">
					<div class="row">
						<div class="input-field col m6 s12">
							<input type="text" name="arrival_flight" class="validate">
							<label>Arrival Flight</label>
						</div>
						<div class="input-field col m6 s12">
							<input type="text" name="arrival_time" class="validate">
							<label>Arrival Time</label>
						</div>
					</div>
					
					<div class="row">
						<div class="input-field col m6 s12">
							<input type="text" name="pic_country" style="border: 1px solid #c9c9c9;" id="select-city" class="autocomplete">
							
							<label>Pic Country</label>
						</div>
						<div class="input-field col m6 s12">
							<input type="text" name="pic_city" style="border: 1px solid #c9c9c9;" id="select-location" class="autocomplete">
							
							<label>Pic City</label>
						</div>						
					</div>
					<div class="row">
						<div class="input-field col m6 s12">
							<input type="text" name="pic_hotel" class="validate">
							<label>Pic Up Hotel</label>
						</div>
						<div class="input-field col m6 s12">
							<input type="text" name="pic_person" class="validate">
							<label>Pic Up Person</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col m12 s12">
							<input type="text" name="pic_price" class="validate">
							<label>Pic Up Price</label>
						</div>
					</div>
					
					
				
				
				
				<h3>Drop Form </h3>
					
					<div class="row">
						<div class="input-field col m6 s12">
							<input type="text" name="depart_flight" class="validate">
							<label>Depart Flight </label>
						</div>
						<div class="input-field col m6 s12">
							<input type="text" name="depart_time" class="validate">
							<label>Depart Time</label>
						</div>
					</div>
					
					<div class="row">
						<div class="input-field col m6 s12">
							<input type="text" name="drop_country" style="border: 1px solid #c9c9c9;" id="select-city" class="autocomplete">
							<label>Drop Country</label>
						</div>
						<div class="input-field col m6 s12">
							<input type="text" name="drop_city" style="border: 1px solid #c9c9c9;" id="select-location" class="autocomplete">
							<label>Drop City</label>
						</div>						
					</div>
					<div class="row">
						<div class="input-field col m6 s12">
							<input type="text" name="drop_hotel" class="validate">
							<label>Drop off Hotel</label>
						</div>
						<div class="input-field col m6 s12">
							<input type="text" name="drop_person" class="validate">
							<label>Drop off Person</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col m12 s12">
							<input type="text" name="drop_price" class="validate">
							<label>Drop Off Price</label>
						</div>
					</div>
					
					<h3>Contact Details </h3>
					
					<div class="row">
						<div class="input-field col m6 s12">
							<input type="text" name="full_name" class="validate" required>
							<label>Full Name <span style="color:red">*</span></label>
						</div>
						<div class="input-field col m6 s12">
							<input type="text" name="emergency_contact" class="validate" >
							<label>Emergency Contact</label>
						</div>
					</div>
					
					<div class="row">
						<div class="input-field col m6 s12">
							<input type="email" name="email" class="validate" required>
							<label>E-Mail <span style="color:red">*</span></label>
						</div>
						<div class="input-field col m6 s12">
							<input type="text" name="mobile" class="validate" required>
							<label>Mobile No <span style="color:red">*</span></label>
						</div>
					</div>
					
					
					<div class="row">
						<div class="input-field col s12">
							<input type="submit" value="submit" class="waves-effect waves-light btn-large full-btn"> </div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</section>
	<!--END BOOKING-->
  @endsection	