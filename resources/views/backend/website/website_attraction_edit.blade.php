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
                  <h1>Edit Attractions</h1>
                  <small>{{$attraction->name}}</small>
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
                              <a class="btn btn-add " href="{{url('/adminwebsitesights')}}"> 
                              <i class="fa fa-list"></i>  Add New Sight </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           
						   {!! Form::open(['method'=>'post','url' => 'adminwebsiteattractionseditsave','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}   
                               {!! csrf_field() !!}
                              
							   <input type="hidden" name="id" class="form-control" value="{{$attraction->id}}">
							  <div class="form-group">
                                 <label>Attraction Image</label>
                                 <input type="text" name="name" class="form-control" value="{{$attraction->name}}" placeholder="Enter Tour Package Name" required>
                              </div>
							  <div class="form-group">
                                 <label>Attraction SKU</label>
                                 <input type="text" name="sku" class="form-control" value="{{$attraction->sku}}" placeholder="Enter Tour Package SKU" required>
                              </div>
							  <div class="form-group">
                                 <label>Price</label>
                                 <input type="text" name="price" class="form-control" value="{{$attraction->sku}}" placeholder="Enter Tour Package SKU" required>
                              </div>	
							  <div class="form-group">
									 <label>Country</label>
									 <select class="js-example-basic-multiple"  name="country[]" style="width:95%;"  multiple="multiple">
										  <?php $selected_country = explode(',',$attraction->country); ?>
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
										  <?php $selected_location = explode(',',$attraction->location); ?>
										  @foreach($selected_location as $sl)
										  <option selected="selected">{{$sl}}</option> 
										  @endforeach 	        
										  @foreach($locationList as $ll)
											<option>{{$ll->location_name}}</option>
										  @endforeach									  
									 </select>
								</div>  
							  
                              <div class="form-group">
                                 <label>Attraction Image</label>
                                 <input type="file" name="image" value="{{$attraction->image}}">                                 
                              </div>
                              <div class="form-group">
                                 <label>Attraction details</label>
                               <textarea class="form-control" id="summernote" name="details" rows="3">{{$attraction->details}}</textarea>
							   
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