@extends('frontend.app')

@section('title', 'Customer Brought')

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
					<h4>Sales</h4>
					<div class="db-2-main-com db-2-main-com-table">
						<table class="responsive-table">
							<thead>
								<tr>
									<th>Item Name</th>
									<th>SKU</th>
									<th>Price</th>
									<th>Payment</th>
									<th>Date</th>
									<th>Status</th>
								</tr>
							</thead>

							<tbody>
								@foreach($cutomerbrought as $sale)
								<tr>
									<td>{{$sale->sales_item_name}}</td>
									<td>{{$sale->sales_sku}}</td>
									<td>{{$sale->sales_price}}</td>
									<td>{{$sale->payment_type}}</td>
									<td>{{$sale->sales_date}}</td>
									<td><span class="db-not-done">OK</span></td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{{$cutomerbrought->links()}}
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
