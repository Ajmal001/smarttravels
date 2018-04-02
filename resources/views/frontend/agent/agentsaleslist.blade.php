@extends('frontend.app')

@section('title', 'Agent Sales')

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
					<h4>Sales</h4>
					<div class="db-2-main-com db-2-main-com-table">
						<div class="row">
							<div class="input-field col s3">
								<a href="{{url('agentpackagesales')}}" class="waves-effect waves-light full-btn">Add Sales</a>
							</div>
						</div>
						<table class="responsive-table">
							<thead>
								<tr>
									<th>Sales Item</th>
									<th>Customer</th>
									<th>Price</th>
									<th>Date</th>
									<th>Commision</th>
								</tr>
							</thead>

							<tbody>
								@foreach($sales as $sale)
								<tr>
									<td>{{$sale->sales_item_name}}</td>
									<td>
										@if($sale->customer)
											{{$sale->customer->customer_name}}
										@endif
								  </td>
									<td>
										{{$sale->sales_price}}
										@if($optionscurrency)
										 {{$optionscurrency->currency}}
										@endif
									</td>
									<td>{{$sale->sales_date}}</td>
								</tr>
								<tr>
									
								</tr>
								@endforeach
							</tbody>
						</table>

						{{$sales->links()}}

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
