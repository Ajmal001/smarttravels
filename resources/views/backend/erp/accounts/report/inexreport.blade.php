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
                                   <td>{{$income_visa_processing_today}}</td>
                                   <td>{{$income_visa_processing_week}}</td>
                                   <td>{{$income_visa_processing_month}}</td>
                                  </tr>

                                  <tr>
                                   <td>Tour Packages</td>
                                   <td>{{$income_tour_packages_today}}</td>
                                   <td>{{$income_tour_packages_week}}</td>
                                   <td>{{$income_tour_packages_month}}</td>
                                  </tr>

                                  <tr>
                                   <td>Hotels</td>
                                   <td>{{$income_hotels_today}}</td>
                                   <td>{{$income_hotels_week}}</td>
                                   <td>{{$income_hotels_month}}</td>
                                  </tr>

                                  <tr>
                                   <td>Sight Seeing</td>
                                   <td>{{$income_sight_seeing_today}}</td>
                                   <td>{{$income_sight_seeing_week}}</td>
                                   <td>{{$income_sight_seeing_month}}</td>
                                  </tr>

                                  <tr>
                                   <td>Air Tickets</td>
                                   <td>{{$income_air_tickets_today}}</td>
                                   <td>{{$income_air_tickets_week}}</td>
                                   <td>{{$income_air_tickets_month}}</td>
                                  </tr>

                                  <tr>
                                   <td>Consultancy</td>
                                   <td>{{$income_consultancy_today}}</td>
                                   <td>{{$income_consultancy_week}}</td>
                                   <td>{{$income_consultancy_month}}</td>
                                  </tr>

                                  <tr>
                                   <td>Others</td>
                                   <td>{{$income_others_today}}</td>
                                   <td>{{$income_others_week}}</td>
                                   <td>{{$income_others_month}}</td>
                                  </tr>

                                 </tbody>
                                 <tfoot>
                                  <tr>
                                   <th>Total </th>
                                   <th>{{$income_total_today}}</th>
                                   <th>{{$income_total_week}} </th>
                                   <th>{{$income_total_month}}</th>
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
                                   <th>Total expense This Month</th>
                                   <th>Total expense This Week</th>
                                  </tr>
                                 </thead>

                                 <tbody>
                                  <tr>
                                   <td>Rent</td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                  </tr>

                                  <tr>
                                   <td>Salary</td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                  </tr>
                                  <tr>
                                   <td>Furniture & Stationary</td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                  </tr>
                                  <tr>
                                   <td>Repair & Maintenance</td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                  </tr>
                                  <tr>
                                   <td>Telephone</td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                  </tr>
                                  <tr>
                                   <td>Utilities</td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                  </tr>
                                  <tr>
                                   <td>Depreciation</td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                  </tr>
                                  <tr>
                                   <td>Commission & Discounts</td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                  </tr>
                                  <tr>
                                   <td>Marketing & Advertising</td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                  </tr>
                                  <tr>
                                   <td>Training Fees</td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                  </tr>
                                  <tr>
                                   <td>Legal Fees</td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                  </tr>
                                  <tr>
                                   <td>Convences</td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                  </tr>
                                  <tr>
                                   <td>Office Tour</td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                  </tr>
                                  <tr>
                                   <td>Others</td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                  </tr>

                                 </tbody>
                                 <tfoot>
                                  <tr>
                                   <th>Total $ 12,94.00</th>
                                   <th>Total $ 784.00</th>
                                   <th>Total $ 954.00</th>
                                   <th>Total $ 741.00</th>
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
