@extends('frontend.app')

@section('title', 'Forgot Password')

@section('body')

<!--DASHBOARD-->
	<section>
		<div class="tr-register">
			<div class="tr-regi-form">
				<h4>Forgot Password</h4>
				<p>It's free and always will be.</p>
				<form class="col s12">
					<div class="row">
						<div class="input-field col s12">
							<input type="email" class="validate">
							<label>Email id</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="submit" value="submit" class="waves-effect waves-light btn-large full-btn"> </div>
					</div>
				</form>
				<p> Are you a new user ? <a href="{{url('/userregister')}}">Register</a>
				</p>
				
			</div>
		</div>
	</section>
	
@endsection