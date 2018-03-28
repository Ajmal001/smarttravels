@extends('backend.app')

@section('title', 'Admin Website Pages')

@section('body')

<style>
.select2-container--default .select2-results__option[aria-selected="true"] {
    background-color: #009688;
	color:white;
}
</style>

     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <div class="header-icon">
              <i class="fa fa-home"></i>
           </div>
           <div class="header-title">
              <h1>Income Expense Report</h1>
              <small>List of all Income Expense Report</small>
           </div>
        </section>
        <!-- Main content -->
        <section class="content">
           <div class="row">
              <div class="col-sm-12">
                 <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                       <div class="btn-group" id="buttonexport">
                          <a href="#">
                             <h4>Report: Daily, Weekly, Monthly </h4>

          									@if ($errors->any())
          										@foreach ($errors->all() as $error)
          											<span style="color:red">{{ $error }}</span>
          										@endforeach
          									@endif

          									@if(Session::has('flash_message_insert'))
          									    <span style="color:green">{{ Session::get('flash_message_insert') }}</span>
          									@elseif(Session::has('flash_message_update'))
          										<span style="color:green">{{ Session::get('flash_message_update') }}</span>
          									@elseif(Session::has('flash_message_delete'))
          										<span style="color:red">{{ Session::get('flash_message_delete') }}</span>
          									@endif
                          </a>
                       </div>
                    </div>
                    <div class="panel-body">
                    <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->


                       <div class="panel-body">
                          <!-- Nav tabs -->
                          <ul class="nav nav-tabs">
                           <li class="active"><a href="#tab1" data-toggle="tab">Income details</a></li>
                           <li><a href="#tab2" data-toggle="tab">Expense details</a></li>
                          </ul>
                          <!-- Tab panels -->
                          <div class="tab-content">
                           <div class="tab-pane fade in active" id="tab1">
                            <div class="panel-body">
                             <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                 <thead>
                                  <tr class="info">
                                   <th>Type of Income</th>
                                   <th>Total Income Today</th>
                                   <th>Total Income This Week</th>
                                   <th>Total Income This Month</th>
                                  </tr>
                                 </thead>
                                 <tbody>
                                  <tr>
                                   <td>Visa Processing</td>
                                   <td>{{$income_visa_processing_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$income_visa_processing_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$income_visa_processing_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                  </tr>

                                  <tr>
                                   <td>Tour Packages</td>
                                   <td>{{$income_tour_packages_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$income_tour_packages_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$income_tour_packages_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                  </tr>

                                  <tr>
                                   <td>Hotels</td>
                                   <td>{{$income_hotels_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$income_hotels_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$income_hotels_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                  </tr>

                                  <tr>
                                   <td>Sight Seeing</td>
                                   <td>{{$income_sight_seeing_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$income_sight_seeing_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$income_sight_seeing_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                  </tr>

                                  <tr>
                                   <td>Air Tickets</td>
                                   <td>{{$income_air_tickets_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$income_air_tickets_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$income_air_tickets_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                  </tr>

                                  <tr>
                                   <td>Consultancy</td>
                                   <td>{{$income_consultancy_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$income_consultancy_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$income_consultancy_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                  </tr>

                                  <tr>
                                   <td>Others</td>
                                   <td>{{$income_others_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$income_others_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$income_others_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                  </tr>

                                 </tbody>
                                 <tfoot>
                                  <tr>
                                   <th>Total </th>
                                   <th>{{$income_total_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </th>
                                   <th>{{$income_total_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </th>
                                   <th>{{$income_total_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </th>
                                  </tr>
                                 </tfoot>
                                </table>
                             </div>
                            </div>
                           </div>
                           <div class="tab-pane fade" id="tab2">
                            <div class="panel-body">
                             <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                 <thead>
                                  <tr class="info">
                                   <th>Total expense</th>
                                   <th>Total expense Today</th>
                                   <th>Total expense This Week</th>
                                   <th>Total expense This Month</th>
                                  </tr>
                                 </thead>

                                 <tbody>
                                  <tr>
                                   <td>Rent</td>
                                   <td>{{$expense_rent_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_rent_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_rent_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                  </tr>

                                  <tr>
                                   <td>Salary</td>
                                   <td>{{$expense_salary_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_salary_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_salary_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                  </tr>

                                  <tr>
                                   <td>Food & Entertainment</td>
                                   <td>{{$expense_food_entertainment_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_food_entertainment_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_food_entertainment_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                  </tr>

                                  <tr>
                                   <td>Furniture & Stationary</td>
                                   <td>{{$expense_furniture_stationary_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_furniture_stationary_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_furniture_stationary_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                  </tr>
                                  <tr>
                                   <td>Repair & Maintenance</td>
                                   <td>{{$expense_repair_maintenance_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_repair_maintenance_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_repair_maintenance_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                  </tr>
                                  <tr>
                                   <td>Telephone</td>
                                   <td>{{$expense_telephone_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_telephone_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_telephone_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                  </tr>
                                  <tr>
                                   <td>Utilities</td>
                                   <td>{{$expense_utilities_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_utilities_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_utilities_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                  </tr>
                                  <tr>
                                   <td>Depreciation</td>
                                   <td>{{$expense_depreciation_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_depreciation_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_depreciation_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                  </tr>
                                  <tr>
                                   <td>Commission & Discounts</td>
                                   <td>{{$expense_commission_discounts_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_commission_discounts_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_commission_discounts_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                  </tr>
                                  <tr>
                                   <td>Marketing & Advertising</td>
                                   <td>{{$expense_marketing_advertising_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_marketing_advertising_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_marketing_advertising_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                  </tr>
                                  <tr>
                                   <td>Training Fees</td>
                                   <td>{{$expense_training_fees_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_training_fees_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_training_fees_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                  </tr>
                                  <tr>
                                   <td>Legal Fees</td>
                                   <td>{{$expense_legal_fees_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_legal_fees_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_legal_fees_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                  </tr>
                                  <tr>
                                   <td>Convences</td>
                                   <td>{{$expense_convences_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_convences_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_convences_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                  </tr>
                                  <tr>
                                   <td>Office Tour</td>
                                   <td>{{$expense_office_tour_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_office_tour_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_office_tour_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                  </tr>
                                  <tr>
                                   <td>Others</td>
                                   <td>{{$expense_others_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_others_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                   <td>{{$expense_others_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </td>
                                  </tr>

                                 </tbody>
                                 <tfoot>
                                  <tr>
                                   <th>Total </th>
                                   <th>{{$expense_total_today}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </th>
                                   <th>{{$expense_total_week}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </th>
                                   <th>{{$expense_total_month}} @if($optionscurrency) {{$optionscurrency->currency}} @endif </th>
                                  </tr>
                                </tfoot></table>
                             </div>
                            </div>
                           </div>


                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>


		</div>


  @endsection
