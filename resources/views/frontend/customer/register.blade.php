@extends('frontend.app')

@section('title', 'Employee Register')

@section('body')
	<!--DASHBOARD-->
	<section>
		<div class="tr-register">
			<div class="tr-regi-form">
				<h4>Create an Account</h4>
				<p>Enter all credentials for create your account.</p>
<<<<<<< HEAD
				<form class="col s12" method="post" action="{{url('employeeregister')}}">
=======
				<form class="col s12" method="post" action="{{url('customerregister')}}">
>>>>>>> 4669e8530e61c1f20661aadfb78c97e3551cfaa5
					{{csrf_field()}}
					<input type="hidden" name="status" value="1">
					<div class="row">
						<div class="input-field col m6 s12">
							<input type="text" name="name" class="validate">
<<<<<<< HEAD
							<label>First Name</label>
						</div>
						<div class="input-field col m6 s12">
							<input type="text" name="employee_designation" class="validate">
=======
							<label>Full Name</label>
						</div>
						<div class="input-field col m6 s12">
							<input type="text" name="customer_profession" class="validate">
>>>>>>> 4669e8530e61c1f20661aadfb78c97e3551cfaa5
							<label>Designation</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
<<<<<<< HEAD
							<input type="number" name="employee_phone" class="validate">
=======
							<input type="number" name="customer_phone" class="validate">
>>>>>>> 4669e8530e61c1f20661aadfb78c97e3551cfaa5
							<label>Mobile</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="email" name="email" class="validate">
							<label>Email</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="password" name="password" class="validate">
							<label>Password</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="password" class="validate">
							<label>Confirm Password</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="submit" value="submit" class="waves-effect waves-light btn-large full-btn"> </div>
					</div>
				</form>
<<<<<<< HEAD
				<p>Are you a already member ? <a href="{{url('/employeelogin')}}">Click to Login</a>
=======
				<p>Are you a already member ? <a href="{{url('/customerlogin')}}">Click to Login</a>
>>>>>>> 4669e8530e61c1f20661aadfb78c97e3551cfaa5
				</p>
			</div>
		</div>
	</section>
	<!--END DASHBOARD-->
@endsection
