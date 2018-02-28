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
					<h4>Edit My Profile </h4>
					<div class="db-2-main-com db2-form-pay db2-form-com">
						<form class="col s12" action="{{url('employeeprofileupdate')}}" method="POST" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="name" class="validate" value="{{$employee->name}}">
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
									<input type="number" name="employee_nid" class="validate" value="{{$employee->profile->employee_nid}}">
									<label>National ID</label>
								</div>
								<div class="input-field col s12 m6">
									<input type="number" name="employee_phone" class="validate" value="{{$employee->profile->employee_phone}}">
									<label>Phone</label>
								</div>
							</div>
							<!--<div class="row">
								<div class="input-field col s12">
									<select>
										<option value="" disabled selected>Select Status</option>
										<option value="1">Active</option>
										<option value="2">Non-Active</option>
									</select>
								</div>
							</div>-->
							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="employee_address" class="validate" value="{{$employee->profile->employee_address}}">
									<label>Address</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="employee_designation" class="validate" value="{{$employee->profile->employee_designation}}">
									<label>Designation</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="employee_details" class="validate" value="{{$employee->profile->employee_details}}">
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
