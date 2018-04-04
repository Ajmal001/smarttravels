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
                  <i class="fa fa-car"></i>
               </div>
               <div class="header-title">
                  <h1>Transfer</h1>
                  <small>List of all Transfers</small>
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
                                 <h4>Pic List</h4>

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

                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Transfer ID </th>
                                       <th>Flight</th>
                                       <th>Time</th>
                                       <th>Country</th>
                                       <th>Location</th>
                                       <th>Hotel</th>
                                       <th>Person</th>
                                       <th>Price</th>
									   <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								    @foreach($picList as $pic)
                                    <tr>
                                       <td>{{$pic->transfer_id}}</td>
                                       <td>{{$pic->arrival_flight}}</td>
                                       <td>{{$pic->arrival_time}}</td>
                                       <td>{{$pic->pic_country}}</td>
                                       <td>{{$pic->pic_city}}</td>
                                       <td>{{$pic->pic_hotel}}</td>
                                       <td>{{$pic->pic_person}}</td>
                                       <td>
                                         {{$pic->pic_price}}
                                         @if($optionscurrency)
                           								{{$optionscurrency->currency}}
                           							 @endif
                                       </td>
                                       <td>
										    <a class="btn btn-add btn-sm" href="adminwebsitepicdetails/{{$pic->transfer_id}}"><i class="fa fa-eye"></i></a>
										    <a class="btn btn-danger btn-sm" href="adminwebsitedeletetourpackages/"><i class="fa fa-trash-o"></i></a>

									   </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>

                              {{$picList->links()}}
                           </div>

                          </div>
                          <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                        </div>
                     </div>
                  </div>

				  <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>Drop List</h4>

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

                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Transfer ID </th>
                                       <th>Flight</th>
                                       <th>Time</th>
                                       <th>Country</th>
                                       <th>Location</th>
                                       <th>Hotel</th>
                                       <th>Person</th>
                                       <th>Price</th>
									   <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								    @foreach($dropList as $drop)
                                    <tr>
                                       <td>{{$drop->transfer_id}}</td>
                                       <td>{{$drop->depart_flight}}</td>
                                       <td>{{$drop->depart_time}}</td>
                                       <td>{{$drop->drop_country}}</td>
                                       <td>{{$drop->drop_city}}</td>
                                       <td>{{$drop->drop_hotel}}</td>
                                       <td>{{$drop->drop_person}}</td>
                                       <td>
                                         {{$drop->drop_price}}
                                         @if($optionscurrency)
                           								{{$optionscurrency->currency}}
                           							 @endif
                                    </td>
                                       <td>
										    <a class="btn btn-add btn-sm" href="adminwebsitedropdetails/{{$drop->transfer_id}}"><i class="fa fa-eye"></i></a>
										    <a class="btn btn-danger btn-sm" href="adminwebsitedeletetourpackages/"><i class="fa fa-trash-o"></i></a>

									   </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                              {{$dropList->links()}}
                           </div>
                         </div>
                         <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                        </div>
                     </div>
                  </div>







			    <!--  Add New Tour Package -->
                <div class="modal fade" id="package" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-plane m-r-5"></i> Add New Hotel </h3>
                        </div>

						<div class="modal-body">
                           <div class="row">
                               <div class="panel-body">

							{!! Form::open(['method'=>'post','url' => 'adminwebsiteinserttourpackages','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
                               {!! csrf_field() !!}
                              <div class="form-group">
                                 <label>Tour Package Name</label>
                                 <input type="text" name="package_name" class="form-control" placeholder="Enter Tour Package Name" required>
                              </div>
							  <div class="form-group">
                                 <label>Package SKU</label>
                                 <input type="text" name="package_sku" class="form-control" placeholder="Enter Tour Package SKU" required>
                              </div>
							  <div class="form-group">
								 <label>Main Package</label>
								 <div class="form-group">
								  <select class="form-control" name="main_package">
									<option>-Select Package-</option>
									<option>Land Package</option>
									<option>Full Package</option>
								  </select>
								 </div>
							  </div>
							  <div class="form-group">
								 <label>General Package Type</label>
								 <div class="form-group">
								  <select class="form-control" name="general_package">
									<option>-Select Package-</option>
									<option>In Bound Package</option>
									<option>Out Bound Package</option>
									<option>Special Package</option>
									<option>Domestic Package</option>
									<option>Family Package</option>
									<option>Honeymoon Package</option>
									<option>Single Package</option>
								  </select>
								 </div>
							  </div>
							  <div class="form-group">
                                 <label>Country</label>
								 <select class="js-example-basic-multiple" name="country[]" style="width:200px;"  multiple="multiple">

								 </select>
                              </div>
                              <div class="form-group">
                                 <label>Locations</label>
                                 <select class="js-example-basic-multiple" name="location[]" style="width:200px;"  multiple="multiple">

								 </select>
                              </div>
                              <div class="form-group">
                                 <label>Price</label>
                                 <input type="text" name="price" class="form-control" placeholder="Enter Price" required>
                              </div>

							  <div class="form-group">
                                 <label>Duration</label>
                                 <input type="text" name="duration" class="form-control" placeholder="Enter Duration" required>
                              </div>

							  <div class="form-group">
                                 <label>Tour Exclude</label>
								 <select class="js-example-basic-multiple" name="tour_exclude[]" style="width:200px;"  multiple="multiple">

								 </select>
                              </div>

							  <div class="form-group">
                                 <label>Tour Include</label>
								 <select class="js-example-basic-multiple" name="tour_include[]" style="width:200px;"  multiple="multiple">

								 </select>
                              </div>

							  <div class="form-group">
                                 <label>Arrival Date</label>
                                 <div class="input-group date form_date" >
                                    <input id='minMaxExample' type="text" name="arrival_date" style="z-index: 1050 !important;" class="form-control years"><span class="input-group-addon"><a href="#"><i class="fa fa-calendar"></i></a></span>
                                 </div>
                              </div>

							  <div class="form-group">
                                 <label>Departure Date</label>
                                 <div class="input-group date form_date" >
                                    <input id='minMaxExample2' type="text" name="departure_date" style="z-index: 1050 !important;" class="form-control years"><span class="input-group-addon"><a href="#"><i class="fa fa-calendar"></i></a></span>
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label>Tour Image</label>
                                 <input type="file" name="tour_image">
                              </div>
                              <div class="form-group">
                                 <label>Tour details</label>
                               <textarea class="form-control" id="summernote" name="tour_details" rows="3"></textarea>

                              </div>
                              <div class="form-group">
							  <input type="submit" value="Save" class="btn btn-success" >
							   </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                  </div>
                  <!-- /.modal-dialog -->
               </div>
			 </div>
            </div>




		</div>


  @endsection
