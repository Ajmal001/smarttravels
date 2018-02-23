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
                  <h1>Visa Requirements</h1>
                  <small>List of all Visa Requirements</small>
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
                                 <h4>Visa Requirement</h4>

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
								
								<a class="btn btn-add" href="#" data-toggle="modal" data-target="#package" > <i class="fa fa-plus"></i> Add New Requirement </a>
								<a class="btn btn-add" href="#" data-toggle="modal" data-target="#country" > <i class="fa fa-plus"></i> Add Country </a>  		
						   </div>
                              
                           </div>
                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Country</th>
                                       <th width="122px">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								    @foreach($visaRequirementsList as $visa)
                                    <tr>
                                       <td>{{$visa->country}}</td>
                                       <td>
										    <a id="viewvisarequirementsmodelbtn" class="btn btn-add btn-sm" href="#" data-id="{{$visa->id}}"><i class="fa fa-eye"></i></a>
										    <a id="editvisarequirementsmodelbtn" class="btn btn-warning btn-sm" href="#" data-id="{{$visa->id}}"><i class="fa fa-pencil"></i></a>
                                            {!! Form::open(['method'=>'post','url'=>'adminwebsitevisarequirementsdelete/{{$visa->id}}','class'=>'pull-right delete-btn','enctype'=>'multipart/form-data']) !!}
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}
                                                <input type="hidden" name="id" value="{{$visa->id}}" >
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                            {!! Form::close() !!}
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
                           <h3><i class="fa fa-plane m-r-5"></i> Add New Visa Requirement </h3>
                        </div>
                        
						<div class="modal-body">
                           <div class="row">
                               <div class="panel-body">
							   
							{!! Form::open(['method'=>'post','url' => 'adminwebsitevisarequirementssave','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}   
                               {!! csrf_field() !!}
							   
							  <div class="form-group">
                                 <label>Country</label>
								 <select class="form-control" name="country" >
									<option value="0">Select Country</option>
									@foreach($countryList as $cl)
									<option>{{$cl->country_name}}</option>
									@endforeach						
								 </select> 
                              </div> 
                              
                              <div class="form-group">
                                 <label>Requirements</label>
                               <textarea class="form-control" id="summernote" name="requirements" rows="3" required></textarea>
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
				    
			   
            <!--  VIEW VISA REQUIRMENT -->
            <div class="modal fade" id="viewvisarequirementsmodel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3><i class="fa fa-plane m-r-5"></i> View Visa Requirement </h3>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="panel-body">

                                    <table class="table table-bordered">
                                        <thead>
                                            <th width="30%">Name</th>
                                            <th>Value</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Country</strong></td>
                                                <td id="country"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Requirements</strong></td>
                                                <td id="requirements"></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    <!-- /.modal-dialog -->
                    </div>
                </div> 			 
            </div> 			
				    
			   
            <!--  EDIT VISA REQUIRMENT -->
            <div class="modal fade" id="editvisarequirementsmodel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3><i class="fa fa-plane m-r-5"></i> Edit Visa Requirement </h3>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="panel-body">

                                {!! Form::open(['method'=>'post','url' => 'adminwebsitevisarequirementseditsave','class'=>'col-sm-10','enctype'=>'multipart/form-data']) !!}   
                                {!! csrf_field() !!}
                                <input type="hidden" name="id" id="visareq_id">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select class="form-control" name="country" id="visareqcountry">
                                        <option disabled selected>Select Country</option>
                                        @foreach($countryList as $cl)
                                        <option>{{$cl->country_name}}</option>
                                        @endforeach						
                                    </select> 
                                </div> 

                                <div class="form-group">
                                    <label>Requirements</label>
                                    <textarea class="form-control" id="summernote-editvisareq" name="requirements" rows="3" required></textarea>
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
			
			
			 
			
		</div> 
		
		 
@endsection    


@section('script')

<script>

    // EDIT VISA REQUIRMENT
    $(document).on('click', '#viewvisarequirementsmodelbtn', function(e){
        e.preventDefault();
        $('#viewvisarequirementsmodel').modal('show');

        var id = $(this).data('id');

        $.get('adminwebsitevisarequirementsview/'+id, function(data){
            $('#viewvisarequirementsmodel #country').html(data.viewvisareq.country);
            $('#viewvisarequirementsmodel #requirements').html(data.viewvisareq.requirements);
        });
    });

    // EDIT VISA REQUIRMENT
    $(document).on('click', '#editvisarequirementsmodelbtn', function(e){
        e.preventDefault();
        $('#editvisarequirementsmodel').modal('show');

        var id = $(this).data('id');

        $.get('adminwebsitevisarequirementsedit/'+id, function(data){
            $('#editvisarequirementsmodel #visareq_id').val(data.editvisareq.id);
            $('#editvisarequirementsmodel #visareqcountry').val(data.editvisareq.country);
            $('#summernote-editvisareq').summernote('code', data.editvisareq.requirements);
        });
    });

</script>

@endsection