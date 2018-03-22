@extends('frontend.app')

@section('title', 'Customer Packages')

@section('body')

<section>
		<div class="db">
			<!--LEFT SECTION-->
			<div class="db-l">

				 @include('frontend.customer.includes.profile')

				<div class="db-l-2">
					@include('frontend.customer.includes.sidebar')
				</div>
			</div>

			<!--CENTER SECTION-->
			<div class="db-2">
				<div class="db-2-com db-2-main">
					<h4>Support List</h4>
					<div class="db-2-main-com db-2-main-com-table">
						<div class="row">
							<div class="input-field col s3">
								<a href="{{url('customersupportscreate')}}" class="waves-effect waves-light full-btn">Send Message</a>
							</div>
						</div>
						<table class="responsive-table">
							<thead>
								<tr>
									<th>Message By</th>
									<th>Message Details</th>
									<th>Status</th>
								</tr>
							</thead>

							<tbody>
								@foreach($customersupports as $support)
									<tr>
										<td>{{$support->message_by}}</td>
										<td>{!!$support->message_details!!}</td>
										<td>
											@if($support->message_status == 'reply')
												<span class="db-done">{{$support->message_status}}</span>
											@else
												<span class="db-not-done">{{$support->message_status}}</span>
											@endif
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						{{$customersupports->links()}}
					</div>
				</div>
			</div>

			<!--RIGHT SECTION-->
			<div class="db-3">
				@include('frontend.customer.includes.announcements')
			</div>
		</div>
	</section>
	<!--END DASHBOARD-->

@endsection
