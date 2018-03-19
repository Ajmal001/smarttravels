@extends('backend.app')

@section('title', 'Admin Website Pages')

@section('body')

<style>
.select2-container--default .select2-results__option[aria-selected="true"] {
    background-color: #009688;
	color:white;
}
</style>

         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-plane"></i>
               </div>
               <div class="header-title">
                  <h1>Edit Hotels</h1>
                  <small>{{$editHotel->hotel_name}}</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist">
                              <a class="btn btn-add " href="{{url('/adminwebsitehotels')}}">
                              <i class="fa fa-list"></i>  Add New Hotel </a>
                           </div>
                        </div>
                        <div class="panel-body">

						   {!! Form::open(['method'=>'post','url' => 'adminwebsiteedithotel','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
                               {!! csrf_field() !!}
							  <input type="hidden" name="hotel_id" value="{{$editHotel->hotel_id}}" >
                              <div class="form-group">
                                 <label>Hotel Name</label>
                                 <input type="text" name="hotel_name" class="form-control"  value="{{$editHotel->hotel_name}}"required>
                              </div>
							  <div class="form-group">
                                 <label>Hotel SKU</label>
                                 <input type="text" name="hotel_sku" class="form-control" value="{{$editHotel->hotel_sku}}" required>
                              </div>

							   <div class="form-group">
									 <label>Country</label>
									 <select class="js-example-basic-multiple"  name="hotel_country[]" style="width:95%;"  multiple="multiple">
										  <?php $selected_country = explode(',',$editHotel->hotel_country); ?>
										  @foreach($selected_country as $sc)
										  <option selected="selected">{{$sc}}</option>
										  @endforeach
										  @foreach($countryList as $cl)
											<option>{{$cl->country_name}}</option>
										  @endforeach
									 </select>
							   </div>

                              <div class="form-group">
									 <label>Locations</label>
									 <select class="js-example-basic-multiple" name="hotel_location[]" style="width:95%;"  multiple="multiple">
										  <?php $selected_location = explode(',',$editHotel->hotel_location); ?>
										  @foreach($selected_location as $sl)
										  <option selected="selected">{{$sl}}</option>
										  @endforeach
										  @foreach($locationList as $ll)
											<option>{{$ll->location_name}}</option>
										  @endforeach
									 </select>
								  </div>

                              <div class="form-group">
                                 <label>Address</label>
                                 <textarea class="form-control"  name="hotel_address" rows="3">{{$editHotel->hotel_address}}</textarea>
                              </div>

							  <div class="form-group">
                                 <label>Price</label>
                                 <input type="text" name="hotel_price" class="form-control" value="{{$editHotel->hotel_price}}" required>
                              </div>

							  <div class="form-group">
                                 <label>Rating</label>
								 <select class="form-control" name="hotel_rating">
									<?php $selected_ratings = explode(',',$editHotel->hotel_rating); ?>
								    @foreach($selected_ratings as $sr)
								    <option selected="selected">{{$sr}}</option>
								    @endforeach
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
								 <select class="js-example-basic-multiple" name="hotel_features[]" style="width:95%;"  multiple="multiple">
									<?php $selected_features = explode(',',$editHotel->hotel_features); ?>
									  @foreach($selected_features as $sf)
									  <option selected="selected">{{$sf}}</option>
									  @endforeach
									@foreach($hotelFeatureList as $hfl)
									<option>{{$hfl->features_name}}</option>
									@endforeach
								 </select>
                              </div>

                              <div class="form-group">
                                 <label>Hotel Image</label>
                                 <input type="file" name="hotel_image" value="{{$editHotel->hotel_image}}">
                              </div>
                              <div class="form-group">
                                 <label>Hotel details</label>
                               <textarea class="form-control" id="summernote" name="hotel_details" rows="3">{{$editHotel->hotel_details}}</textarea>

                              </div>
                              <div class="form-group">
							  <input type="submit" value="Save" class="btn btn-success" >
							   </div>
                            {!! Form::close() !!}


						  </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->




  @endsection
