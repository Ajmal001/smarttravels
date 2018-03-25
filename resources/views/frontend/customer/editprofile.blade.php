@extends('frontend.app')

@section('title', 'Customer Edit Profile')

@section('body')

<section>
		<div class="db">
			<!--LEFT SECTION-->
			<div class="db-l">
				  @include('frontend.customer.includes.profile')
				<div class="db-l-2">
					@include('frontend.customer.includes.sidebar')
				</div>
			</div>
			<!--CENTER SECTION-->
			<div class="db-2">
				<div class="db-2-com db-2-main">
					<h4>Edit My Profile </h4>
					<div class="db-2-main-com db2-form-pay db2-form-com">
						<form class="col s12" action="{{url('customerprofileupdate')}}" method="POST" enctype="multipart/form-data">
							{{csrf_field()}}

							<input type="hidden" name="customer_id" class="validate" value="{{$customer->customer_id}}">
							<div class="row">
								<div class="input-field col s12 m6">
									<label>Customer Name</label>
								</div>
								<div class="input-field col s12 m6">
									<input type="text" name="customer_name" class="validate" value="{{$customer->customer_name}}">
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12 m6">
									<label>National ID</label>
								</div>
								<div class="input-field col s12 m6">
									<input type="number" name="customer_nid" class="validate" value="{{$customer->customer_nid}}">
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12 m6">
									<label>Phone</label>
								</div>
								<div class="input-field col s12 m6">
										<input type="number" name="customer_phone" class="validate" value="{{$customer->customer_phone}}">
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12 m6">
									<label>Address</label>
								</div>
								<div class="input-field col s12 m6">
									<input type="text" name="customer_address" class="validate" value="{{$customer->customer_address}}">
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12 m6">
									<label>Company</label>
								</div>
								<div class="input-field col s12 m6">
									<input type="text" name="customer_company" class="validate" value="{{$customer->customer_company}}">
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12 m6">
									<label>Country</label>
								</div>
								<div class="input-field col s12 m6">
									<input type="text" name="customer_country" class="validate" value="{{$customer->customer_country}}">
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12 m6">
									<label>City</label>
								</div>
								<div class="input-field col s12 m6">
									<input type="text" name="customer_city" class="validate" value="{{$customer->customer_city}}">
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12 m6">
									<label>Zip Code</label>
								</div>
								<div class="input-field col s12 m6">
									<input type="text" name="customer_zip" class="validate" value="{{$customer->customer_zip}}">
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12 m6">
									<label>Profession</label>
								</div>
								<div class="input-field col s12 m6">
									<input type="text" name="customer_profession" class="validate" value="{{$customer->customer_profession}}">
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12 m6">
									<label>Passport No</label>
								</div>
								<div class="input-field col s12 m6">
									<input type="text" name="customer_passport_no" class="validate" value="{{$customer->customer_passport_no}}">
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12 m6">
									<label>Facebook</label>
								</div>
								<div class="input-field col s12 m6">
									<input type="text" name="customer_facebook" class="validate" value="{{$customer->customer_facebook}}">
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12 m6">
									<label>Linkedin</label>
								</div>
								<div class="input-field col s12 m6">
								  <input type="text" name="customer_linkedin" class="validate" value="{{$customer->customer_linkedin}}">
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12 m6">
									<label>Profile Photo</label>
								</div>
								<div class="input-field col s12 m6">
								  <input type="file" name="customer_image" value="{{$customer->customer_image}}">
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12">
									<input type="submit" value="Update Changes" class="waves-effect waves-light full-btn">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!--RIGHT SECTION-->
			<div class="db-3">
				@include('frontend.customer.includes.exclusive_packages')
			</div>
		</div>
	</section>
	<!--END DASHBOARD-->

    @endsection
