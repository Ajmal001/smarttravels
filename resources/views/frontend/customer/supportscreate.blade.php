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

							<input type="hidden" name="message_by" value="customer">
							<input type="hidden" name="message_status" value="question">

							<div class="row">
								<div class="input-group col s12">
									<label>Message Details</label>
									<textarea id="summernote" name="message_details" class="form-control" rows="8" cols="80"></textarea>
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
