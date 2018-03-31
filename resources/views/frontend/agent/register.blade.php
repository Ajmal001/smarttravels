@extends('frontend.app')

@section('title', 'Agent Register')

@section('body')
	<!--DASHBOARD-->
	<section>
		<div class="tr-register">
			<div class="tr-regi-form">
				<h4>Create an Account</h4>
				<p>Enter all credentials for create your account.</p>
				<form class="col s12" method="post" action="{{url('agentregister')}}">
					{{csrf_field()}}
					<input type="hidden" name="status" value="1">
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="name" class="validate" required>
							<label>Full Name</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="number" name="agent_phone" class="validate" required>
							<label>Mobile</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="agent_area" class="validate" required>
							<label>Area</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="email" name="email" class="validate" required>
							<label>Email</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="password" name="password" class="validate" required>
							<label>Password</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="password" class="validate" required>
							<label>Confirm Password</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="submit" value="submit" class="waves-effect waves-light btn-large full-btn"> </div>
					</div>
				</form>
				<p>Are you a already member ? <a href="{{url('/agentlogin')}}">Click to Login</a>
				</p>
			</div>
		</div>
	</section>
	<!--END DASHBOARD-->
@endsection
