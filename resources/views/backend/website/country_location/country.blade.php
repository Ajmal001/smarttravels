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
                  <i class="fa fa-globe"></i>
               </div>
               <div class="header-title">
                  <h1>Countries</h1>
                  <small>List of all Countries</small>
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
                                 <h4>Country List</h4>

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
								<a class="btn btn-add" href="#" data-toggle="modal" data-target="#country" > <i class="fa fa-plus"></i> Add New Country </a>
						   </div>

                           </div>
                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Country</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								     @foreach($countries as $country)
                                    <tr>
                                       <td>{{$country->country_name}}</td>
                                       <td>
										    <a id="editcountrymodalbtn" class="btn btn-warning btn-sm pull-left m-r-5" href="#" data-id="{{$country->country_id}}"><i class="fa fa-eye"></i></a>
                                            {!! Form::open(['method'=>'post','url'=>'countrydelete/{{$country->country_id}}','class'=>'delete-btn','enctype'=>'multipart/form-data']) !!}
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}
                                                <input type="hidden" name="country_id" value="{{$country->country_id}}" >
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                            {!! Form::close() !!}
                                       </td>
                                    </tr>
                                       @endforeach
                                 </tbody>
                              </table>
                              {{$countries->links()}}
                           </div>
                        </div>
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

							{!! Form::open(['method'=>'post','url' => 'adminwebsiteinsertcountry','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
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


		    <!--  EDIT MODAL START -->
            <div class="modal fade" id="editcountrymodal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3><i class="fa fa-plane m-r-5"></i> Edit Country </h3>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="panel-body">

                                {!! Form::open(['method'=>'post','url' => '','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
                                {!! csrf_field() !!}

                                    <div class="form-group">
                                        <label>Country Name</label>
                                        <input type="text" name="country_name" class="form-control" id="country_name" required>
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
            </div>
            <!-- EDIT MODAL END -->



		</div>


  @endsection

  @section('script')
  <script>
    $(document).on('click','#editcountrymodalbtn', function(e){
        e.preventDefault();
        $('#editcountrymodal').modal('show');
        var id = $(this).data('id');
        $('#editcountrymodal form').attr('action','countryupdate/'+id);
        $.get('countryedit/'+id, function(data){
            $('#editcountrymodal #country_name').val(data.country.country_name);
        });
    });
  </script>
  @endsection
