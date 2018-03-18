@extends('frontend.app')

@section('title', 'Customer Login')

@section('body')
	<!--DASHBOARD-->
	<section>
		<div class="tr-register">
			<div class="tr-regi-form">
				<h4>Customer Login</h4>
				<p>Enter your login information .</p>
				<form class="col s12" method="POST" action="{{ url('customerlogin') }}">
					{{ csrf_field() }}

					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<div class="row">
							<div class="input-field col s12">
								<input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required autofocus>
								<label>Email</label>

								@if ($errors->has('email'))
										<span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
										</span>
								@endif

							</div>
						</div>
					</div>

					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<div class="row">
								<div class="input-field col s12">
									<input id="password" type="password" class="validate" name="password" required>
									<label>Password</label>
									@if ($errors->has('password'))
											<span class="help-block">
													<strong>{{ $errors->first('password') }}</strong>
											</span>
									@endif
								</div>
							</div>
					</div>

					@if ($errors->has('status'))
							<span class="help-block">
									<strong>You are not active yet</strong>
							</span>
					@endif

				<div class="row">
					<div class="input-field col s12">
						<input type="submit" value="submit" class="waves-effect waves-light btn-large full-btn"> </div>
				</div>


				</form>
				<p><a href="{{url('/userforgetpass')}}">forgot password ?</a> | Are you a new user ? <a href="{{url('/customerregister')}}">Register</a>
				</p>

			</div>
		</div>
	</section>
	<!--END DASHBOARD-->
   @endsection
