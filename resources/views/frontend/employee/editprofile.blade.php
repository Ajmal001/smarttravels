@extends('frontend.app')

@section('title', 'Employee Edit Profile')

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
					<div class="db-2-main-com db2-form-pay db2-form-com">
						<form class="col s12" action="{{url('employeeprofileupdate')}}" method="POST" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="employee_name" class="validate" value="{{$employee->employee_name}}">
									<label>Full Name</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m6">
									<input type="number" name="employee_nid" class="validate" value="{{$employee->employee_nid}}">
									<label>National ID</label>
								</div>
								<div class="input-field col s12 m6">
									<input type="number" name="employee_phone" class="validate" value="{{$employee->employee_phone}}">
									<label>Phone</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="employee_address" class="validate" value="{{$employee->employee_address}}">
									<label>Address</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="employee_designation" class="validate" value="{{$employee->employee_designation}}">
									<label>Designation</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="employee_details" class="validate" value="{{$employee->employee_details}}">
									<label>Details</label>
								</div>
							</div>
							<div class="row db-file-upload">
								<div class="file-field input-field">
									<div class="db-up-btn"> <span>File</span>
										<input type="file" name="employee_image">
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
				@include('frontend.employee.includes.announcements')
			</div>
		</div>
	</section>
	<!--END DASHBOARD-->

    @endsection
