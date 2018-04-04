@extends('frontend.app')

@section('title', 'Booking')

@section('body')

<style>
.tr-register{
 background-image: url("{{ URL::to('/') }}/public/backendimages/plane.png");
}
</style>

<!--BOOKING-->
	<section>
		<div class="tr-register">
			<div class="tr-regi-form">
				<h4><span>Air Ticket</span> BOOKING</h4>

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

					{!! Form::open(['url' => 'airticketbookingsave','class'=>'col s12','enctype'=>'multipart/form-data']) !!}
					<input type="hidden" name="service_id" value="{{request()->segment(2)}}" class="validate">
					<div class="row">
						<div class="input-field col m6 s12">
							<input type="text" name="name" class="validate" required>
							<label>Name <span style="color:red">*</span></label>
						</div>
						<div class="input-field col m6 s12">
							<input type="number" name="mobile" class="validate" required>
							<label>Mobile <span style="color:red">*</span></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col m12 s12">
							<input type="email" name="email" class="validate" required>
							<label>Email <span style="color:red">*</span></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col m6 s12">
							<input type="text" name="country" style="border: 1px solid #c9c9c9;" id="country" class="autocomplete" class="validate" required>
							<label>Country <span style="color:red">*</span></label>
						</div>
						<div class="input-field col m6 s12">
							<input type="text" name="city" style="border: 1px solid #c9c9c9;" id="city" class="autocomplete" class="validate" required>
							<label>City <span style="color:red">*</span></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col m4 s12">
							<input type="text" name="no_of_adults" class="validate">
							<label>Adults ( 12+ Years)<span style="color:red">*</span></label>
						</div>
						<div class="input-field col m4 s12">
							<input type="text" name="no_of_childrens" class="validate">
							<label>Childrens ( 2 - 12 Years)</label>
						</div>
						<div class="input-field col m4 s12">
							<input type="text" name="no_of_infant" class="validate">
							<label>Infant ( 0 - 2 Years)</label>
						</div>
					</div>

					<div class="row">
						<div class="input-field col m6 s12">
							<input type="text" name="date_from"  id="from" required>
							<label>Arrival Date <span style="color:red">*</span></label>
						</div>
						<div class="input-field col m6 s12">
							<input type="text" name="date_to"  id="to">
							<label>Return Date</label>
						</div>
					</div>

					<div class="row">
						<div class="input-field col m6 s12">
							<label>Upload Your Passport Image Here</label>
						</div>
						<div class="input-field col m6 s12">
							<input type="file" name="image">
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
