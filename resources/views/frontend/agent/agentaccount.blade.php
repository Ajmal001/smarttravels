@extends('frontend.app')

@section('title', 'Agent Account')

@section('body')

<section>
		<div class="db">
			<!--LEFT SECTION-->
			<div class="db-l">
				  @include('frontend.agent.includes.profile')
				<div class="db-l-2">
					@include('frontend.agent.includes.sidebar')
				</div>
			</div>
			<!--CENTER SECTION-->
			<div class="db-2">
				<div class="db-2-com db-2-main">
					<h4>Edit Account </h4>

					@if(Session::has('flash_message_update'))
							<span style="color:green;padding:10px;display:block;">{{ Session::get('flash_message_update') }}</span>
					@else
							<span style="color:red;padding:10px;display:block;">{{ Session::get('flash_error_message') }}</span>
					@endif

					<div class="db-2-main-com db2-form-pay db2-form-com">
						<form class="col s12" action="{{url('agentaccountsettings')}}" method="POST" enctype="multipart/form-data">
							{{csrf_field()}}
							<input type="hidden" name="agent_id" class="validate">

							<div class="row">
								<div class="input-field col s12 m3">
									<label>New Password:</label>
								</div>
								<div class="input-field col s12 m9">
									<input type="password" name="newpassword" class="validate" required>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12 m3">
									<label>Retype Password:</label>
								</div>
								<div class="input-field col s12 m9">
									<input type="password" name="renewpassword" class="validate" required>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12">
									<input type="submit" value="Update" class="waves-effect waves-light full-btn">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!--RIGHT SECTION-->
			<div class="db-3">
				@include('frontend.agent.includes.announcements')
			</div>
		</div>
	</section>
	<!--END DASHBOARD-->

    @endsection
