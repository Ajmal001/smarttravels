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
					<h4>My Expense</h4>
					<div class="db-2-main-com db-2-main-com-table">
						<div class="row">
							<div class="input-field col s3">
								<a href="{{url('employeeexpenseadd')}}" class="waves-effect waves-light full-btn">Add Expense</a>
							</div>
						</div>
						<table class="responsive-table">
							<thead>
								<tr>
									<th>Expence Title</th>
									<th>Expence Anount</th>
									<th>Expence Date</th>
								</tr>
							</thead>

							<tbody>
								@foreach($expenses as $expense)
								<tr>
									<td>{{$expense->expense_title}}</td>
									<td>
										{{$expense->expense_amount}}
										@if($optionscurrency)
											{{$optionscurrency->currency}}
										@endif
									</td>
									<td>{{$expense->expense_date}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{{$expenses->links()}}
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
