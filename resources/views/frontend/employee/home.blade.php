@extends('frontend.app')

@section('title', 'Employee Profile')

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
					<h4>My Profile</h4>
					<div class="db-2-main-com db-2-main-com-table">
						<table class="responsive-table">
							<tbody>
								<tr>
									<td>Employee Name</td>
									<td>:</td>
									<td>{{$employee->employee_name}}</td>
								</tr>
								<tr>
									<td>Eamil</td>
									<td>:</td>
									<td>{{$employee->email}}</td>
								</tr>
								<tr>
									<td>Phone</td>
									<td>:</td>
									<td>{{$employee->employee_phone}}</td>
								</tr>
								<tr>
									<td>Address</td>
									<td>:</td>
									<td>{{$employee->employee_address}}</td>
								</tr>
								<tr>
									<td>National ID</td>
									<td>:</td>
									<td>{{$employee->employee_nid}}</td>
								</tr>
								<tr>
									<td>Designation</td>
									<td>:</td>
									<td>{{$employee->employee_designation}}</td>
								</tr>
								<tr>
									<td>Status</td>
									<td>:</td>
									<td>
										@if($employee->status == 1)
										<span class="db-done">Active</span>
										@else
										<span class="db-not-done">Inactive</span>
										@endif
									</td>
								</tr>
							</tbody>
						</table>
						<br>
						<a href="{{url('employeeprofileedit')}}" class="btn btn-info"><b>Edit Profile</b></a>

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
