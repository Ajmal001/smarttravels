@extends('frontend.app')

@section('title', 'Employee Attendence')

@section('body')

<section>
		<div class="db">
			<!--LEFT SECTION-->
			<div class="db-l">

				 @include('frontend.employee.includes.profile')

				<div class="db-l-2">
					@include('frontend.employee.includes.sidebar')
				</div>
			</div>

			<!--CENTER SECTION-->
			<div class="db-2">
				<div class="db-2-com db-2-main">
					<h4>My Attendence</h4>
					<div class="db-2-main-com db-2-main-com-table">
						<table class="responsive-table">
							<thead>
								<tr>
									<th>Date</th>
									<th>In Time</th>
									<th>Out Time</th>
									<th>Note</th>
								</tr>
							</thead>

							<tbody>
								@foreach($attendences as $attendence)
								<tr>
									<td>{{$attendence->date}}</td>
									<td>{{$attendence->in_time}}</td>
									<td>{{$attendence->out_time}}</td>
									<td>{{$attendence->note}}</td>									
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<!--RIGHT SECTION-->
			<div class="db-3">
				@include('frontend.employee.includes.announcements')
			</div>
		</div>
	</section>
	<!--END DASHBOARD-->

    @endsection
