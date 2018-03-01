@extends('frontend.app')

@section('title', 'Employee Login')

@section('body')

<section>
		<div class="db">
			<!--LEFT SECTION-->
			<div class="db-l">
				<div class="db-l-1">
					<ul>
						<li><img src="{{ URL::to('/') }}/public/backendimages/{{$employee->profile->employee_image}}" alt="" />
						</li>
						<li><span>80%</span> profile compl</li>
						<li><span>18</span> Notifications</li>
					</ul>
				</div>
				<div class="db-l-2">
					@include('frontend.employee.includes.sidebar')
				</div>
			</div>
			<!--CENTER SECTION-->
			<div class="db-2">
				<div class="db-2-com db-2-main">
					<h4>Attendence</h4>
					<div class="db-2-main-com db-2-main-com-table">
						<table class="responsive-table">

							<tbody>
                                @foreach($attendences as $attendence)
								<tr>
									<td>{{$attendence->date}}</td>
									<td>{{$attendence->in_time}}</td>
									<td>{{$attendence->out_time}}</td>
									<td>{{$attendence->in_ip}}</td>
									<td>{{$attendence->out_ip}}</td>
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
