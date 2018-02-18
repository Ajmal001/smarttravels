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
                  <h1>Edit Tour Package</h1>
                  <small>{{$editPackage->package_name}}</small>
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
                              <a class="btn btn-add " href="{{url('/adminwebsitetourpackages')}}"> 
                              <i class="fa fa-list"></i>  Add New Tour Package </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           
						   {!! Form::open(['method'=>'post','url' => 'adminwebsiteedittourpackagessave','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}   
						       {!! csrf_field() !!}
							   <input type="hidden" name="package_id" value="{{$editPackage->package_id}}" >
                              <div class="form-group">
									 <label>Tour Package Name</label>
									 <input type="text" name="package_name" class="form-control" value="{{$editPackage->package_name}}" required>
							  </div>
							  <div class="form-group">
                                 <label>Package SKU</label>
                                 <input type="text" name="package_sku" class="form-control" value="{{$editPackage->package_sku}}" placeholder="Enter Tour Package SKU" required>
                              </div>
                              <div class="form-group">
									 <label>Main Package</label>
									 <div class="form-group">
									  <select class="form-control" name="main_package">
										<option  selected ="selected">{{$editPackage->main_package}}</option>
										<option>Land Package</option>
										<option>Full Package</option>
									  </select>
									 </div>
								  </div>							  
								  <div class="form-group">
									 <label>General Package Type</label>
									 <div class="form-group">
									  <select class="form-control" name="general_package" >
										<option  selected="selected">{{$editPackage->general_package}}</option>
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
									 <select class="js-example-basic-multiple"  name="country[]" style="width:95%;"  multiple="multiple">
										  <?php $selected_country = explode(',',$editPackage->country); ?>
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
									 <select class="js-example-basic-multiple" name="location[]" style="width:95%;"  multiple="multiple">
										  <?php $selected_location = explode(',',$editPackage->location); ?>
										  @foreach($selected_location as $sl)
										  <option selected="selected">{{$sl}}</option> 
										  @endforeach 	        
										  @foreach($locationList as $ll)
											<option>{{$ll->location_name}}</option>
										  @endforeach									  
									 </select>
								  </div>                              
								  <div class="form-group">
									 <label>Price</label>
									 <input type="text" name="price" class="form-control" value="{{$editPackage->price}}" placeholder="Enter Price" required>
								  </div>
								  
								  <div class="form-group">
									 <label>Duration</label>
									 <input type="text" name="duration" class="form-control" value="{{$editPackage->duration}}" placeholder="Enter Duration" required>
								  </div>
								  
								  <div class="form-group">
									 <label>Tour Exclude</label>
									 <select class="js-example-basic-multiple"  name="tour_exclude[]" style="width:95%;"  multiple="multiple">
										  <?php $selected_exin = explode(',',$editPackage->tour_exclude); ?>
										  @foreach($selected_exin as $sc)
										  <option selected="selected">{{$sc}}</option> 
										  @endforeach 	        
										  @foreach($exInList as $exIn)
											 <option>{{$exIn->exin_name}}</option>
										  @endforeach											  
									 </select>
								  </div>
								  
								  <div class="form-group">
									 <label>Tour Include</label>
									 <select class="js-example-basic-multiple"  name="tour_include[]" style="width:95%;"  multiple="multiple">
										  <?php $selected_exin = explode(',',$editPackage->tour_include); ?>
										  @foreach($selected_exin as $sc)
										  <option selected="selected">{{$sc}}</option> 
										  @endforeach 	        
										  @foreach($exInList as $exIn)
											 <option>{{$exIn->exin_name}}</option>
										  @endforeach											  
									 </select>
								  </div>
								  
								  <div class="form-group">
									 <label>Arrival Date</label>
									 <div class="input-group date form_date" >
										<input id='minMaxExample' type="text" name="arrival_date" value="{{$editPackage->arrival_date}}" style="z-index: 1050 !important;" class="form-control years"><span class="input-group-addon"><a href="#"><i class="fa fa-calendar"></i></a></span>
									 </div>
								  </div>
							  
								  <div class="form-group">
									 <label>Departure Date</label>
									 <div class="input-group date form_date" >
										<input id='minMaxExample2' type="text" name="departure_date" value="{{$editPackage->departure_date}}" style="z-index: 1050 !important;" class="form-control years"><span class="input-group-addon"><a href="#"><i class="fa fa-calendar"></i></a></span>
									 </div>
								  </div>	
								  
								  <div class="form-group">
									 <label>Tour Image</label>
									 <input type="file" value="{{$editPackage->tour_image}}" name="tour_image">                                 
								  </div>
								 
								  
								  <div class="form-group">
                                 <label>Tour details</label>
                                 <textarea class="form-control" id="summernote" name="tour_details" rows="3">{{$editPackage->tour_details}}</textarea>
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