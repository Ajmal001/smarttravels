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
                  <h1>Attraction Tickets</h1>
                  <small>List of all Attractions</small>
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
                                 <h4>Attraction List</h4>

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
								<a class="btn btn-add" href="#" data-toggle="modal" data-target="#package" > <i class="fa fa-plus"></i> Add New Attraction </a>
								<a class="btn btn-add" href="#" data-toggle="modal" data-target="#country" > <i class="fa fa-plus"></i> Add Country </a>
								<a class="btn btn-add" href="#" data-toggle="modal" data-target="#location" > <i class="fa fa-plus"></i> Add Location </a>
						   </div>

                           </div>
                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Attraction Image</th>
                                       <th>Attraction Name</th>
                                       <th>SKU</th>
                                       <th>Country</th>
                                       <th>Location</th>
                                       <th>Price</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
									@foreach($attractionList as $attr)
                                    <tr>
                                       <td><img src="{{ URL::to('/') }}/public/backendimages/{{$attr->image}}" class="img-circle" alt="User Image" width="50" height="50"></td>
                                       <td>{{$attr->name}}</td>
                                       <td>{{$attr->sku}}</td>
                                       <td>{{$attr->country}}</td>
                                       <td>{{$attr->location}}</td>
                                       <td>
                                         {{$attr->price}}
                                         @if($optionscurrency)
                           								{{$optionscurrency->currency}}
                           							@endif
                                       </td>
                                       <td>

										    <a class="btn btn-add btn-sm" href="adminwebsiteattractionsedit/{{$attr->id}}"><i class="fa fa-pencil"></i></a>
										    <a class="btn btn-danger btn-sm" href="adminwebsiteattractionsdelete/{{$attr->id}}"><i class="fa fa-trash-o"></i></a>

									   </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                              {{$attractionList->links()}}
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
                           <h3><i class="fa fa-plane m-r-5"></i> Add New Attraction </h3>
                        </div>

						<div class="modal-body">
                           <div class="row">
                               <div class="panel-body">

							{!! Form::open(['method'=>'post','url' => 'adminwebsiteinsertattractions','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
                               {!! csrf_field() !!}
                              <div class="form-group">
                                 <label>Attraction Name</label>
                                 <input type="text" name="name" class="form-control" placeholder="Enter Attraction Name" required>
                              </div>
							  <div class="form-group">
                                 <label>Attraction SKU</label>
                                 <input type="text" name="sku" class="form-control" placeholder="Enter Attraction SKU" required>
                              </div>

							  <div class="form-group">
                                 <label>Attraction Price</label>
                                 <input type="text" name="price" class="form-control" placeholder="Enter Attraction SKU" required>
                              </div>

							  <div class="form-group">
                                 <label>Country</label>
								 <select class="js-example-basic-multiple" name="country[]" style="width:200px;"  multiple="multiple">
									@foreach($countryList as $cl)
									<option>{{$cl->country_name}}</option>
									@endforeach
								 </select>
                              </div>

                               <div class="form-group">
                                 <label>Locations</label>
                                 <select class="js-example-basic-multiple" name="location[]" style="width:200px;"  multiple="multiple">
									@foreach($locationList as $ll)
									<option>{{$ll->location_name}}</option>
									@endforeach
								 </select>
                              </div>

                              <div class="form-group">
                                 <label>Attraction Image</label>
                                 <input type="file" name="image" required>
                              </div>
                              <div class="form-group">
                                 <label>Attraction details</label>
                               <textarea class="form-control" id="summernote" name="details" rows="3"></textarea>

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

		</div>


  @endsection
