@extends('frontend.app')

@section('title', 'Agent Profile')

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
					<h4>My Profile <a href="{{url('agentprofileedit')}}" class="waves-effect waves-light pull-right" style="border: 1px solid #337ab7;padding: 0px 12px;border-radius: 4px;">Edit Profile</a></h4>
					<div class="db-2-main-com db-2-main-com-table">
						<table class="responsive-table">
							<tbody>
								<tr>
									<td>Full Name</td>
									<td>:</td>
									<td>{{$agent->name}}</td>
								</tr>
								<tr>
									<td>Eamil</td>
									<td>:</td>
									<td>{{$agent->email}}</td>
								</tr>
								<tr>
									<td>Phone</td>
									<td>:</td>
									<td>{{$agent->agent_phone}}</td>
								</tr>
								<tr>
									<td>Area</td>
									<td>:</td>
									<td>{{$agent->agent_area}}</td>
								</tr>
							</tbody>
						</table>
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
