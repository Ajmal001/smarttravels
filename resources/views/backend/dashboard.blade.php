@extends('backend.app')

@section('title', 'Dashboard')

@section('body')

         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-dashboard"></i>
               </div>
               <div class="header-title">
                  <h1>Smart Travel Admin Dashboard</h1>
                  <small>Powerd By - Smart Web</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox1">
                        <div class="statistic-box">
                           <i class="fa fa-globe fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number">{{$totalTourPackages}}</span>
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3> Tour Packages </h3>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox4">
                        <div class="statistic-box">
                           <i class="fa fa-home fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number">{{$totalHotels}}</span>
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3> Hotels </h3>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox2">
                        <div class="statistic-box">
                           <i class="fa fa-pagelines fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number">{{$totalSightSeeing}}</span>
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3> Sight Seeing </h3>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox3">
                        <div class="statistic-box">
                           <i class="fa fa-address-card fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number">{{$totalVisaApply}}</span>
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3> Visa Apply</h3>
                        </div>
                     </div>
                  </div>
               </div>


               <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox1">
                        <div class="statistic-box">
                           <i class="fa fa-users fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number">{{$totalCustomers}}</span>
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3> Customers </h3>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox4">
                        <div class="statistic-box">
                           <i class="fa fa-user-circle  fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number">{{$totalEmployees}}</span>
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3> Employees </h3>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox2">
                        <div class="statistic-box">
                           <i class="fa fa-cart-plus  fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number">{{$sale_total_month}} {{$optionscurrency->currency}}</span>
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3> Sales [<?php echo date('F'); ?>]</h3>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox3">
                        <div class="statistic-box">
                           <i class="fa fa-money fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number">{{$expense_total_month}} {{$optionscurrency->currency}}</span>
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3> Expenses [<?php echo date('F'); ?>]</h3>
                        </div>
                     </div>
                  </div>
               </div>

               <!-- Start -->
               <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                     <div class="panel panel-bd lobidisable">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Sales</h4>
                           </div>
                        </div>
                        <div class="panel-body">
                          @foreach($sales as $sale)
                           <div class="work-touchpoint">
                              <div class="work-touchpoint-date">
                                 <span class="day">{{date('d', strtotime($sale->sales_date))}}</span>
                                 <span class="month">{{date('M', strtotime($sale->sales_date))}}</span>
                              </div>
                           </div>
                           <div class="detailswork">
                              <span class="label-success label label-default pull-right">{{$sale->sales_price}} {{$optionscurrency->currency}}</span>
                              <a href="#" title="headings">{{$sale->sales_item_name}}</a> <br>
                              <p>by {{$sale->sales_by_type}} on {{$sale->payment_type}}</p>
                           </div>
                          @endforeach
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                     <div class="panel panel-bd lobidisable">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Tasks</h4>
                           </div>
                        </div>
                        <div class="panel-body">
                          @foreach($tasks as $task)
                           <div class="work-touchpoint">
                              <div class="work-touchpoint-date">
                                 <span class="day">{{date('d', strtotime($task->task_date))}}</span>
                                 <span class="month">{{date('M', strtotime($task->task_date))}}</span>
                              </div>
                           </div>
                           <div class="detailswork">


                              @if($task->task_status == 1)
                              <span class="label-success label label-default pull-right">Done</span>
                              @elseif($task->task_date > $today)
                              <span class="label-info label label-default pull-right">Pending</span>
                              @else
                              <span class="label-danger label label-default pull-right">Late</span>
                              @endif

                              <a href="#" title="headings">{{$task->task_title}}</a> <br>
                              <p>
                               {{ date('d M, Y', strtotime($task->task_date)) }} for
                               @if($task->task_assigned_to)
                                @foreach($employees as $employee)
                                  @if($employee->id == $task->task_assigned_to)
                                  {{$employee->name}}
                                  @endif
                                @endforeach
                               @endif
                             </p>
                           </div>
                          @endforeach
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End  -->

               <div class="row">
                  <!-- bar chart Monthly Sells -->
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                     <div class="panel panel-bd lobidisable">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Sales of <?php echo date('F'); ?></h4>
                           </div>
                        </div>
                        <div class="panel-body">
                           <canvas id="monthlySells" height="100"></canvas>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.row -->

               <div class="row">
                  <!-- Barchart -->
                  <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                     <div class="panel panel-bd lobidisable">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>This Year Earnings & Expenses(Bar chart)</h4>
                           </div>
                        </div>
                        <div class="panel-body">
                           <canvas id="barChartIncomeExpense" height="150"></canvas>
                        </div>
                     </div>
                  </div>
                  <!-- bar chart -->
                  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                     <div class="panel panel-bd lobidisable">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Weekly Earnings & Expenses</h4>
                           </div>
                        </div>
                        <div class="panel-body">
                           <canvas id="weeklyIncomeExpense" height="323"></canvas>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.row -->


            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->

@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function() {

      $.get( "adminmonthlyexpanse", function( data ) {
        //bar chart
        var ctxie = document.getElementById("barChartIncomeExpense");
        var myChart = new Chart(ctxie, {
          type: 'bar',
          data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "august", "september","october", "Nobemver", "December"],
            datasets: [
              {
                label: "Monthly Income",
                data: data.incomes,
                borderColor: "rgba(0, 150, 136, 0.8)",
                width: "1",
                borderWidth: "0",
                backgroundColor: "rgba(0, 150, 136, 0.8)"
              },
              {
                label: "Monthly Expense",
                data: data.expenses,
                borderColor: "rgba(51, 51, 51, 0.55)",
                width: "1",
                borderWidth: "0",
                backgroundColor: "rgba(51, 51, 51, 0.55)"
              }
            ]
          },
          options: {
            scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
            }
          }
        });
      });


      $.get( "adminweeklyexpanse", function( data ) {
        //bar chart
        var ctxmie = document.getElementById("weeklyIncomeExpense");
        var myChart = new Chart(ctxmie, {
          type: 'bar',
          data: {
            labels: data.sevendays,
            datasets: [
              {
                label: "Weekly Income",
                data: data.incomes,
                borderColor: "rgba(0, 150, 136, 0.8)",
                width: "1",
                borderWidth: "0",
                backgroundColor: "rgba(0, 150, 136, 0.8)"
              },
              {
                label: "Weekly Expense",
                data: data.expenses,
                borderColor: "rgba(51, 51, 51, 0.55)",
                width: "1",
                borderWidth: "0",
                backgroundColor: "rgba(51, 51, 51, 0.55)"
              }
            ]
          },
          options: {
            scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
            }
          }
        });
      });

      // Monthly Sell
      $.get( "adminmonthlysales", function( data ) {
        //bar chart
        var ctxms = document.getElementById("monthlySells");
        var myChart = new Chart(ctxms, {
          type: 'bar',
          data: {
            labels: data.daysofmonth,
            datasets: [
              {
                label: "Monthly Sells",
                data: data.incomes,
                borderColor: "rgba(0, 150, 136, 0.8)",
                width: "1",
                borderWidth: "0",
                backgroundColor: "rgba(0, 150, 136, 0.8)"
              }
            ]
          },
          options: {
            scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
            }
          }
        });
      });


    });
  </script>
  @endsection
