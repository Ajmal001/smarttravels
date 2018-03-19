@extends('frontend.app')

@section('title', 'User Login')

@section('body')
	<!--DASHBOARD-->
	<section>
		<div class="tr-register">
			<div class="tr-regi-form">
				<h4>Sign In</h4>
				<p>It's free and always will be.</p>
				<form class="col s12">
					<div class="row">
						<div class="input-field col s12">
							<input type="text" class="validate">
							<label>User Name</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="password" class="validate">
							<label>Password</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="submit" value="submit" class="waves-effect waves-light btn-large full-btn"> </div>
					</div>
				</form>
				<p><a href="{{url('/userforgetpass')}}">forgot password ?</a> | Are you a new user ? <a href="{{url('/userregister')}}">Register</a>
				</p>
				
			</div>
		</div>
	</section>
	<!--END DASHBOARD-->
   @endsection