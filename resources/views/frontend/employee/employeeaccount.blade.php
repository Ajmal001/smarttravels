@extends('frontend.app')

@section('title', 'Customer Account')

@section('body')

<section>
		<div class="db">
			<!--LEFT SECTION-->
			<div class="db-l">
				  @include('frontend.employee.includes.profile')
				<div class="db-l-2">
					@include('frontend.employee.includes.sidebar')
				</div>
			</div>
			<!--CENTER SECTION-->
			<div class="db-2">
				<div class="db-2-com db-2-main">
					<h4>Edit My Profile </h4>

					@if(Session::has('flash_message_update'))
							<span style="color:green;padding:10px;display:block;">{{ Session::get('flash_message_update') }}</span>
					@else
							<span style="color:red;padding:10px;display:block;">{{ Session::get('flash_error_message') }}</span>
					@endif

					<div class="db-2-main-com db2-form-pay db2-form-com">

						@if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
						@if ($errors->any())
						    <div class="alert alert-danger">
						    		@foreach ($errors->all() as $error)
						        		{{ $error }} <br>
						        @endforeach
						    </div>
						@endif

						<form class="col s12" action="{{url('employeeaccount')}}" method="POST" enctype="multipart/form-data">
							{{csrf_field()}}

							<div class="row">
								<div class="input-field col s12 m4">
									<label>Current Password:</label>
								</div>
								<div class="input-field col s12 m8">
									<input type="password" name="currentpassword" class="validate" required>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12 m4">
									<label>New Password:</label>
								</div>
								<div class="input-field col s12 m8">
									<input type="password" name="newpassword" class="validate" required>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12 m4">
									<label>Confirm New Password:</label>
								</div>
								<div class="input-field col s12 m8">
									<input type="password" name="newpassword_confirmation" class="validate" required>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12">
									<input type="submit" value="Update" class="waves-effect waves-light full-btn">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!--RIGHT SECTION-->
			<div class="db-3">
				@include('frontend.employee.includes.announcements')
			</div>
		</div>
	</section>
	<!--END DASHBOARD-->

    @endsection
