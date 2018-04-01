@extends('frontend.app')

@section('title', 'Employee Tasks')

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
					<h4>My Tasks </h4>
					<div class="db-2-main-com db2-form-pay db2-form-com">
              <ul>
                  @foreach($tasks as $task)
                      <li style="border: 1px solid #dcdcdc; padding-left: 12px;">
                          <h5>{{$task->task_title}}</h5>
                          <p>{{$task->task_date}}</p>
                          <p>{!!$task->task_details!!}</p>

													@if($task->task_status == 1)
													<span class="label-success label label-default" style="font-size:9pt">Done</span>
													@elseif($task->task_date > $today)
                          <span class="label-info label label-default" style="font-size:9pt">Pending</span>
                          @else
                          <span class="label-danger label label-default" style="font-size:9pt">Late</span>
                          @endif
                      </li>
                  @endforeach
              </ul>
					</div>
					{{ $tasks->links() }}
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
