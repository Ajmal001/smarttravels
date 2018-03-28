@extends('frontend.app')

@section('title', 'Customer Payments')

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
					<h4>My Payments</h4>


					<div class="db-2-main-com db-2-main-com-table">
						<b>Total Cash Payment = {{$totalCash}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </b><br>
						<b>Total Due Remaining = {{$totalDue}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </b>
						<table class="responsive-table">
							<thead>
								<tr>
									<th>Item</th>
									<th>Price</th>
									<th>Payment</th>
									<th>Date</th>
								</tr>
							</thead>

							<tbody>
								@foreach($cutomerPayment as $sale)
								<tr>
									<td>{{$sale->sales_item_name}}</td>
									<td>{{$sale->sales_price}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
									<td>
										@if($sale->payment_type == 'cash')
										<span class="db-done">{{$sale->payment_type}}</span>
										@else
										<span class="db-not-done">{{$sale->payment_type}}</span>
										@endif
									</td>
									<td>{{$sale->sales_date}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{{$cutomerPayment->links()}}
					</div>
				</div>
			</div>

			<!--RIGHT SECTION-->
			<div class="db-3">
				@include('frontend.customer.includes.exclusive_packages')
			</div>
		</div>
	</section>
	<!--END DASHBOARD-->

@endsection
