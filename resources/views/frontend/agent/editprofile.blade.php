@extends('frontend.app')

@section('title', 'Agent Edit Profile')

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
					<h4>Edit My Profile </h4>
					<div class="db-2-main-com db2-form-pay db2-form-com">
						<form class="col s12" action="{{url('agentprofileupdate')}}" method="POST" enctype="multipart/form-data">
							{{csrf_field()}}
							<input type="hidden" name="agent_id" value="{{$agent->id}}">
							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="name" class="validate" value="{{$agent->name}}">
									<label>Name</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="number" name="agent_phone" class="validate" value="{{$agent->agent_phone}}">
									<label>Phone</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="agent_area" class="validate" value="{{$agent->agent_area}}">
									<label>Area</label>
								</div>
							</div>

							<div class="row db-file-upload">
								<div class="file-field input-field">
									<div class="db-up-btn"> <span>File</span>
										<input type="file" name="agent_image">
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
				@include('frontend.agent.includes.announcements')
			</div>
		</div>
	</section>
	<!--END DASHBOARD-->

@endsection
