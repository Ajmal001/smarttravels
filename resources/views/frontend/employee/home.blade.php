@extends('frontend.app')

@section('title', 'Employee Login')

@section('body')

<section>
		<div class="db">
			<!--LEFT SECTION-->
			<div class="db-l">
				<div class="db-l-1">
					<ul>
						<li><img src="{{ URL::to('/') }}/public/backendimages/{{$employee->profile->employee_image}}" alt="" />
						</li>
						<li><span>80%</span> profile compl</li>
						<li><span>18</span> Notifications</li>
					</ul>
				</div>
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
						<div class="db-mak-pay-bot">
							<p>{{$employee->profile->employee_details}}</p> 
							<a href="{{url('employeeprofileedit')}}" class="waves-effect waves-light btn-large">Edit my profile</a> 
						</div>
					</div>
				</div>
			</div>
			<!--RIGHT SECTION-->
			<div class="db-3">
				<h4> <span style="margin-left:45px; font-size:18px;font-weight: 700;">Announcement</span> </h4>
				<ul>
					<li>
						<a href="#!"> <img src="images/icon/dbr1.jpg" alt="" />
							<h5>50% Discount Offer</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="images/icon/dbr2.jpg" alt="" />
							<h5>paris travel package</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="images/icon/dbr3.jpg" alt="" />
							<h5>Group Trip - Available</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="images/icon/dbr4.jpg" alt="" />
							<h5>world best travel agency</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="images/icon/dbr5.jpg" alt="" />
							<h5>special travel coupons</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="images/icon/dbr6.jpg" alt="" />
							<h5>70% Offer 2018</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="images/icon/dbr7.jpg" alt="" />
							<h5>Popular Cities</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="images/icon/dbr8.jpg" alt="" />
							<h5>variations of passages</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</section>
	<!--END DASHBOARD-->

    @endsection
