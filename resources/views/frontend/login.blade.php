@extends('frontend.app')

@section('title', 'Login')

@section('body')

	<style>
		.input-field.col.s12 .btn-large:hover {
		    background: #c3c3c3;
		}
	</style>

	<!--DASHBOARD-->
	<section>
		<div class="tr-register">
			<div class="tr-regi-form">
				<h4>Login Your Account</h4>
				<p>Select your account type</p>



				<div class="row">
					<div class="input-field col s12">
						<a href="{{url('/employeelogin')}}" type="submit" class="waves-effect waves-light btn-large full-btn" style="font-size:40px">Employee </a> </div>
				</div>
         <h3>OR</h3>
        <div class="row">
          <div class="input-field col s12">
            <a href="" type="submit" class="waves-effect waves-light btn-large full-btn" style="font-size:40px">Customer</a> </div>
        </div>


			</div>
		</div>
	</section>
	<!--END DASHBOARD-->
   @endsection
