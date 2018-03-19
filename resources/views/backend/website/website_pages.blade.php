@extends('backend.app')

@section('title', 'Admin Website Pages')

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
                  <h1>Website Pages</h1>
                  <small>Powerd By - Smart Web</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  
				  <a href="">
				  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox1">
                        <div class="statistic-box">
                           <i class="fa fa-home fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="slight">
                              </span>
                           </div>
                           <h3 style="color:white;"> Home Page</h3> 
                        </div>
                     </div>
                  </div>
				  </a>
				  
                  <a href="{{url('/adminwebsitetourpackages')}}">
				  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox2">
                        <div class="statistic-box">
                           <i class="fa fa-plane fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number">4 Packages</span> 
                              <span class="slight">
                              </span>
                           </div>
                           <h3>  Tour Packages </h3>
                        </div>
                     </div>
                  </div>
				  </a>
				  
				  <a href="{{url('/adminwebsitehotels')}}">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox4">
                        <div class="statistic-box">
                           <i class="fa fa-university fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number">11 Hotels</span> 
                              <span class="slight">
                              </span>
                           </div>
                           <h3> Hotels </h3>
                        </div>
                     </div>
                  </div>
				  </a>	

				   
				  
				 <a href="{{url('/adminwebsitesights')}}">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox3">
                        <div class="statistic-box">
                           <i class="fa fa-eye fa-3x"></i>
                           <div class="counter-number pull-right">
                             <span class="count-number">95 Sights</span> 
                              <span class="slight">
                              </span>
                           </div>
                           <h3>  Sight Seeing </h3>
                        </div>
                     </div>
                  </div>
				  </a>
				  
				  <a href="{{url('/adminwebsitetransfer')}}">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox4">
                        <div class="statistic-box">
                           <i class="fa fa-birthday-cake fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number">11 Events</span> 
                              <span class="slight">
                              </span>
                           </div>
                           <h3>Transfers </h3>
                        </div>
                     </div>
                  </div>
				  </a>
				  
				  <a href="{{url('/adminwebsiteattractions')}}">
				  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox1">
                        <div class="statistic-box">
                           <i class="fa fa-pencil-square-o  fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number">11 Tickets</span> 
                              <span class="slight">
                              </span>
                           </div>
                           <h3> Attraction Ticket</h3>
                        </div>
                     </div>
                  </div>
				  </a>			  
				  
				  
				  <a href="">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox4">
                        <div class="statistic-box">
                           <i class="fa fa-user-plus fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number">11 People</span> 
                              <span class="slight">
                              </span>
                           </div>
                           <h3> Visa </h3>
                        </div>
                     </div>
                  </div>
				  </a>

				  <a href="">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox4">
                        <div class="statistic-box">
                           <i class="fa fa-cogs  fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="slight">
                              </span>
                           </div>
                           <h3> Settings </h3>
                        </div>
                     </div>
                  </div>
				  </a>		
				 
				  
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
		 
  @endsection    