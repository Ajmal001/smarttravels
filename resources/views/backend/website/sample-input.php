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
						   </div>
                              
                           </div>
                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Tour Image</th>
                                       <th>Package Name</th>
                                       <th>Package Type</th>
                                       <th>Country</th>
                                       <th>Location</th>
                                       <th>Price</th>
                                       <th>Duration</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								
                                    <tr>
                                       <td><img src="{{ URL::to('/') }}/public/backendimages/" class="img-circle" alt="User Image" width="50" height="50"> </td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td>
                                          
										    <a class="btn btn-add btn-sm" href="adminwebsiteedittourpackages/"><i class="fa fa-pencil"></i></a>
										    <a class="btn btn-danger btn-sm" href="adminwebsitedeletetourpackages/"><i class="fa fa-trash-o"></i></a>
                                           	
									   </td>
                                    </tr>
                                 
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