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
						<form class="col s12" action="{{url('customersupportscreate')}}" method="POST" enctype="multipart/form-data">
							{{csrf_field()}}

							<div class="row">
								<div class="input-field col s12">
									<select name="message_by">
										<option value="" disabled selected>Select Message By</option>
										<option value="customer">Customer</option>
										<option value="admin">Admin</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="message_details" class="validate">
									<label>Message Details</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<select name="message_status">
										<option value="" disabled selected>Select Status</option>
										<option value="1">Active</option>
										<option value="2">Inactive</option>
									</select>
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
