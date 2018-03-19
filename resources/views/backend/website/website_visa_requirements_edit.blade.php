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
                  <h1>Edit Visa Requirements</h1>
                  <small>{{$editVisa->country}}</small>
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
                              <a class="btn btn-add " href="{{url('/adminwebsitevisarequirements')}}"> 
                              <i class="fa fa-list"></i>  Add Visa Requirements </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           
						   {!! Form::open(['method'=>'post','url' => 'adminwebsitevisarequirementseditsave','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}   
						       {!! csrf_field() !!}
							     <input type="hidden" name="id" value="{{$editVisa->id}}" >
                              
								 <div class="form-group">
									 <label>Country</label>
								 <div class="form-group">
								 
                                 <select class="form-control" name="country">
									<option selected>{{$editVisa->country}}</option>
									@foreach($countryList as $cl)
									<option>{{$cl->country_name}}</option>
									@endforeach						
								 </select> 
							  
								  </div>
								  
								  <div class="form-group">
									 <label>Requirements</label>
								   <textarea class="form-control" id="summernote" name="requirements" rows="3">{{$editVisa->requirements}}</textarea>
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