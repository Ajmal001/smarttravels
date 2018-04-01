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
					<h4>Add Sales</h4>
					<div class="db-2-main-com db2-form-pay db2-form-com">
						<form class="col s12" action="{{url('agentpackagesales')}}" method="POST" enctype="multipart/form-data">
							{{csrf_field()}}

							<div class="row">
								<div class="input-field col s12">
									<select name="sales_item_type">
	                  <option disabled selected>Select Type</option>
	                  <option value="visa_processing">Visa Processing</option>
	                  <option value="tour_packages">Tour Packages</option>
	                  <option value="hotels">Hotels</option>
	                  <option value="sight_seeing">Sight Seeing</option>
	                  <option value="air_tickets">Air Tickets</option>
	                  <option value="consultancy">Consultancy</option>
	                  <option value="others">Others</option>
	                </select>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="sales_item_name" class="validate" required>
									<label>Item Name</label>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="sales_sku" class="validate" required>
									<label>SKU</label>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12">
									<select name="sales_customer_id" required>
                    <option disabled selected>Select Customer</option>
										@foreach($customers as $customer)
                    <option value="{{$customer->customer_id}}">{{$customer->customer_name}}</option>
                    @endforeach
                  </select>
								</div>
							</div>

							<input type="hidden" name="sales_by_type" value="Agent">
							<input type="hidden" name="sales_by_id" value="{{$agent->id}}">

							<div class="row">
								<div class="input-field col s12">
									<select name="payment_type" required>
                    <option disabled selected>Select Payment Type</option>
                    <option value="cash">Cash</option>
                    <option value="due">Due</option>
                  </select>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12">
									<select name="payment_method" >
                    <option disabled selected>Select Method</option>
                    <option value="bank">Bank</option>
                    <option value="check">Check Payment</option>
                    <option value="paypal">Paypal</option>
                    <option value="card">Card Payment</option>
                  </select>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="payment_info" class="validate" required>
									<label>Payment Info</label>
								</div>
							</div>

							<div class="row">
								<div class="input-field col m6 s12">
									<input type="number" name="sales_price" class="validate" required>
									<label>Price</label>
								</div>
								<div class="input-field col m6 s12">
									<input type="text" name="sales_date" id="to" required>
									<label>Date</label>
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
