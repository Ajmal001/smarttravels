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
									<td>User Name</td>
									<td>:</td>
									<td>{{$employee->name}}</td>
								</tr>
								<!--<tr>
									<td>Password</td>
									<td>:</td>
									<td>mypasswordtour</td>
								</tr>-->
								<tr>
									<td>Eamil</td>
									<td>:</td>
									<td>{{$employee->email}}</td>
								</tr>
								<tr>
									<td>Phone</td>
									<td>:</td>
									<td>{{$employee->profile->employee_phone}}</td>
								</tr>
								<!--<tr>
									<td>Date of birth</td>
									<td>:</td>
									<td>03 Jun 1990</td>
								</tr>-->
								<tr>
									<td>Address</td>
									<td>:</td>
									<td>{{$employee->profile->employee_address}}</td>
								</tr>
								<tr>
									<td>National ID</td>
									<td>:</td>
									<td>{{$employee->profile->employee_nid}}</td>
								</tr>
								<tr>
									<td>Designation</td>
									<td>:</td>
									<td>{{$employee->profile->employee_designation}}</td>
								</tr>
								<tr>
									<td>Status</td>
									<td>:</td>
									<td><span class="db-done">Active</span></td>
								</tr>
							</tbody>
						</table>

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
