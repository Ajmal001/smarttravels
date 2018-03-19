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
							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="name" class="validate" value="{{$customer->name}}">
									<label>User Name</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m6">
									<input type="password" name="password" class="validate">
									<label>Enter Password</label>
								</div>
								<div class="input-field col s12 m6">
									<input type="password" name="password" class="validate">
									<label>Confirm Password</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m6">
									<input type="number" name="customer_nid" class="validate" value="{{$customer->profile->customer_nid}}">
									<label>National ID</label>
								</div>
								<div class="input-field col s12 m6">
									<input type="number" name="customer_phone" class="validate" value="{{$customer->profile->customer_phone}}">
									<label>Phone</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="customer_address" class="validate" value="{{$customer->profile->customer_address}}">
									<label>Address</label>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12 m6">
									<input type="text" name="customer_company" class="validate" value="{{$customer->profile->customer_company}}">
									<label>Company</label>
								</div>
								<div class="input-field col s12 m6">
									<input type="text" name="customer_country" class="validate" value="{{$customer->profile->customer_country}}">
									<label>Country</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m6">
									<input type="text" name="customer_city" class="validate" value="{{$customer->profile->customer_city}}">
									<label>City</label>
								</div>
								<div class="input-field col s12 m6">
									<input type="text" name="customer_zip" class="validate" value="{{$customer->profile->customer_zip}}">
									<label>Zip Code</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="customer_profession" class="validate" value="{{$customer->profile->customer_profession}}">
									<label>Profession</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="customer_passport_no" class="validate" value="{{$customer->profile->customer_passport_no}}">
									<label>Passport No</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="customer_facebook" class="validate" value="{{$customer->profile->customer_facebook}}">
									<label>Facebook</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="customer_linkedin" class="validate" value="{{$customer->profile->customer_linkedin}}">
									<label>Linkedin</label>
								</div>
							</div>
							<div class="row db-file-upload">
								<div class="file-field input-field">
									<div class="db-up-btn"> <span>File</span>
										<input type="file" name="customer_image">
									</div>
									<div class="file-path-wrapper">
										<input class="file-path validate" type="text">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="submit" value="SUBMIT" class="waves-effect waves-light full-btn">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!--RIGHT SECTION-->
			<div class="db-3">
				@include('frontend.customer.includes.announcements')
			</div>
		</div>
	</section>
	<!--END DASHBOARD-->

    @endsection
