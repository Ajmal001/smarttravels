@extends('frontend.app')

@section('title', 'Employee Expense')

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
					<h4>Add Expense </h4>
					<div class="db-2-main-com db2-form-pay db2-form-com">
						<form class="col s12" action="{{url('employeeexpensecreate')}}" method="POST" enctype="multipart/form-data">
							{{csrf_field()}}

							<input type="hidden" name="expense_added_by" value="">

							<div class="row">
								<div class="input-field col s12">
									<select name="expense_type">
										<option value="" disabled selected>Select Expense Type</option>
										<option value="food_entertainment">Food & Entertainment</option>
										<option value="furniture_stationary">Furniture & Stationary</option>
										<option value="repair_maintenance">Repair & Maintenance</option>
										<option value="telephone">Telephone</option>
										<option value="utilities">Utilities</option>
										<option value="depreciation">Depreciation</option>
										<option value="commission_discounts">Commission & Discounts</option>
										<option value="marketing_advertising">Marketing & Advertising</option>
										<option value="training_fees">Training Fees</option>
										<option value="legal_fees">Legal Fees</option>
										<option value="convences">Convences</option>
										<option value="office_tour">Office Tour</option>
										<option value="others">Others</option>
										<option value="rent">Rent</option>
										<option value="salary">Salary</option>
									</select>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="expense_title" class="validate" value="">
									<label>Expense Title</label>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="expense_amount" class="validate" value="">
									<label>Amount</label>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12">
									<input type="text" id="to" name="expense_date" required>
									<label>Date</label>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12">
									<input type="submit" value="ADD EXPENSE" style="backend-color:black" class="waves-effect waves-light full-btn">
								</div>
							</div>
						</form>

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
