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
                  <h1>Hotels</h1>
                  <small>List of all Hotels</small>
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
                                 <h4>Hotels List</h4>

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
                           <div class="btn-group">
                                <div class="buttonexport" id="buttonlist">
								<a class="btn btn-add" href="#" data-toggle="modal" data-target="#package" > <i class="fa fa-plus"></i> Add New Hotel </a>
								<a class="btn btn-add" href="#" data-toggle="modal" data-target="#country" > <i class="fa fa-plus"></i> Add Country </a>
								<a class="btn btn-add" href="#" data-toggle="modal" data-target="#location" > <i class="fa fa-plus"></i> Add Location </a>
								<a class="btn btn-add" href="#" data-toggle="modal" data-target="#features" > <i class="fa fa-plus"></i> Add Features </a>
						   </div>

                           </div>
                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Hotel Image</th>
                                       <th>Hotel Name</th>
                                       <th>SKU</th>
                                       <th>Country</th>
                                       <th>Rating</th>
                                       <th>Price</th>
                                       <th>action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								    @foreach($hotelList as $hl)
                                    <tr>
                                       <td><img src="{{ URL::to('/') }}/public/backendimages/{{$hl->hotel_image}}" class="img-circle" alt="User Image" width="50" height="50"> </td>
                                       <td>{{$hl->hotel_name}}</td>
                                       <td>{{$hl->hotel_sku}}</td>
                                       <td>{{$hl->hotel_country}}</td>
                                       <td>{{$hl->hotel_rating}}</td>
                                       <td>{{$hl->hotel_price}}</td>
                                       <td>

										    <a class="btn btn-add btn-sm" href="adminwebsiteshowedithotel/{{$hl->hotel_id}}"><i class="fa fa-pencil"></i></a>
										    <a class="btn btn-danger btn-sm" href="adminwebsitedeletehotel/{{$hl->hotel_id}}"><i class="fa fa-trash-o"></i></a>

									   </td>
                                    </tr>
									@endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>




			    <!--  Add New Tour Package -->
                <div class="modal fade" id="package" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-home m-r-5"></i> Add New Hotel </h3>
                        </div>

						<div class="modal-body">
                           <div class="row">
                               <div class="panel-body">

							{!! Form::open(['method'=>'post','url' => 'adminwebsiteinserthotel','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
                               {!! csrf_field() !!}
                              <div class="form-group">
                                 <label>Hotel Name</label>
                                 <input type="text" name="hotel_name" class="form-control" placeholder="Enter Hotel Name" required>
                              </div>
							  <div class="form-group">
                                 <label>Hotel SKU</label>
                                 <input type="text" name="hotel_sku" class="form-control" placeholder="Enter Hotel SKU" required>
                              </div>

							  <div class="form-group">
                <label>Country</label>
								 <select class="js-example-basic-multiple" name="hotel_country[]" style="width:200px;"  multiple="multiple" required>
									@foreach($countryList as $cl)
									<option>{{$cl->country_name}}</option>
									@endforeach
								 </select>
                </div>

                               <div class="form-group">
                                 <label>Locations</label>
                                 <select class="js-example-basic-multiple" name="hotel_location[]" style="width:200px;"  multiple="multiple" required>
									@foreach($locationList as $ll)
									<option>{{$ll->location_name}}</option>
									@endforeach
								 </select>
                              </div>

                              <div class="form-group">
                                 <label>Address</label>
                                 <textarea class="form-control"  name="hotel_address" rows="3"></textarea>
                              </div>

							  <div class="form-group">
                                 <label>Price</label>
                                 <input type="text" name="hotel_price" class="form-control" placeholder="Enter Price" required>
                              </div>

							  <div class="form-group">
                                 <label>Rating</label>
                                 <select class="form-control" name="hotel_rating" required>
									<option value="0" disabled selected>Select Rating</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
								  </select>
							  </div>

							  <div class="form-group">
                                 <label>Hotel Features</label>
								 <select class="js-example-basic-multiple" name="hotel_features[]" style="width:200px;"  multiple="multiple">
									@foreach($hotelFeatureList as $hfl)
									<option>{{$hfl->features_name}}</option>
									@endforeach
								 </select>
                              </div>

                              <div class="form-group">
                                 <label>Hotel Image</label>
                                 <input type="file" name="hotel_image" required>
                              </div>
                              <div class="form-group">
                                 <label>Hotel details</label>
                               <textarea class="form-control" id="summernote" name="hotel_details" rows="3"></textarea>

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



			<!--  Add Country -->
                <div class="modal fade" id="country" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-globe m-r-5"></i> Add Country </h3>
                        </div>

						<div class="modal-body">
                           <div class="row">
                               <div class="panel-body">

							{!! Form::open(['method'=>'post','url' => 'adminwebsiteinserthotelcountry','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
                               {!! csrf_field() !!}
                              <div class="form-group">
                                 <label>Country Name</label>
                                 <input type="text" name="country_name" class="form-control" placeholder="Enter Country Name" required>
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



			 <!--  Add New Location -->
                <div class="modal fade" id="location" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-plane m-r-5"></i> Add Location </h3>
                        </div>

						<div class="modal-body">
                           <div class="row">
                               <div class="panel-body">

							{!! Form::open(['method'=>'post','url' => 'adminwebsiteinserthotellocation','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
                               {!! csrf_field() !!}
                              <div class="form-group">
                                 <label>Country</label>
                                 <select class="form-control" name="country_id">
									<option>-Select Country-</option>
									@foreach($countryList as $cl)
									<option value="{{$cl->country_id}}">{{$cl->country_name}}</option>
									@endforeach
								  </select>
                              </div>

							  <div class="form-group">
                                 <label>Location Name</label>
                                 <input type="text" name="location_name" class="form-control" placeholder="Enter Location Name" required>
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


			<!--  Add New Features -->
                <div class="modal fade" id="features" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-plane m-r-5"></i> Add Hotel Features </h3>
                        </div>

						<div class="modal-body">
                           <div class="row">
                               <div class="panel-body">

							{!! Form::open(['method'=>'post','url' => 'adminwebsiteinserthotelfeature','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
                               {!! csrf_field() !!}


							  <div class="form-group">
                                 <label>Hotel Features Name</label>
                                 <input type="text" name="features_name" class="form-control" placeholder="Enter Features Name" required>
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
