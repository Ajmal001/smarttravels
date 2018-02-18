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
                  <h1>Transfer Drop Details</h1>
                  <small>Details of Transfer Drop</small>
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
                                 <h4>Transfer Drop Details</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                                                         
                          @foreach($dropDetails as $drop)
                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr>
                                       <th>Transfer ID</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>{{$drop->transfer_id}}	</td>
                                    </tr>
                                 </tbody>
								 
								 
								 <thead>
                                    <tr>
                                       <th>Arrival Flight</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>{{$drop->depart_flight}}	</td>
                                    </tr>
                                 </tbody>
								 
								 
								 <thead>
                                    <tr>
                                       <th>Arrival Time</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>{{$drop->depart_time}}	</td>
                                    </tr>
                                 </tbody>
								 
								 <thead>
                                    <tr>
                                       <th>Country</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>{{$drop->drop_country}}	</td>
                                    </tr>
                                 </tbody>
								 
								 <thead>
                                    <tr>
                                       <th>Location</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>{{$drop->drop_city}}	</td>
                                    </tr>
                                 </tbody>
								 
								 <thead>
                                    <tr>
                                       <th>Hotel</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>{{$drop->drop_hotel}}	</td>
                                    </tr>
                                 </tbody>
								 
								 <thead>
                                    <tr>
                                       <th>Person</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>{{$drop->drop_person}}	</td>
                                    </tr>
                                 </tbody>
								 
								 <thead>
                                    <tr>
                                       <th>Price</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>{{$drop->drop_price}}	</td>
                                    </tr>
                                 </tbody>
								 
                              </table>
                           </div>
						    @endforeach
                        </div>
                     </div>
                  </div>
				  
               </div>
			</div>  

			
			   
			<div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>Client Details</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                                                         
                          @foreach($infoDetails as $info)
                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr>
                                       <th>Full Name</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>{{$info->full_name}}	</td>
                                    </tr>
                                 </tbody>
								 
								 
								 <thead>
                                    <tr>
                                       <th>Emergency Contact</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>{{$info->emergency_contact}}	</td>
                                    </tr>
                                 </tbody>
								 
								 
								 <thead>
                                    <tr>
                                       <th>Email</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>{{$info->email}}	</td>
                                    </tr>
                                 </tbody>
								 
								 <thead>
                                    <tr>
                                       <th>Mobile</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>{{$info->mobile}}	</td>
                                    </tr>
                                 </tbody>
								 
                              </table>
                           </div>
						    @endforeach
                        </div>
                     </div>
					 
					 
                  </div>
				  
				  
				  
				  
				  
				  
               </div>               
					
					
					

					
				    
			   
			    
			
			
			 
			
		</div> 
		
		 
  @endsection    