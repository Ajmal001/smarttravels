@extends('backend.app')

@section('title', 'Admin Website Pages')

@section('body')

         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-home"></i>
               </div>
               <div class="header-title">
                  <h1>Hotel Booking List</h1>
                  <small>Powerd By - Smart Web</small>
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
                                 <h4>List of Hotel Bookings</h4>

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



                           </div>
                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Hotel Details</th>
									   <th>Name</th>
                                       <th>Mobile</th>
                                       <th>Date</th>
                                       <th>Adults</th>
                                       <th>Childrens</th>
                                       <th>Arrival Date</th>
                                       <th>Depart Date</th>
                                       <th>Delete</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								    @foreach($hotelBooking as $tb)
                                    <tr>
                                       <td><a target="_blank" href="hoteldetails/{{$tb->service_id}}" >View Hotel </a></td>
									   <td>{{$tb->name}}</td>
                                       <td>{{$tb->mobile}}</td>
                                       <td>{{$tb->b_date}}</td>
                                       <td>{{$tb->no_of_adults}}</td>
                                       <td>{{$tb->no_of_childrens}}</td>
                                       <td>{{$tb->date_from}}</td>
                                       <td>{{$tb->date_to}}</td>
                                       <td>

										     <a class="btn btn-danger btn-sm" href="adminwebsitebookingdelete/{{$tb->booking_id}}"><i class="fa fa-trash-o"></i></a>

									   </td>
                                    </tr>
									@endforeach
                                 </tbody>
                              </table>
                              {{$hotelBooking->links()}}
                           </div>
                        </div>

                     </div>

                  </div>
               </div>

			</section>


  @endsection
