@extends('backend.app')

@section('title', 'Admin Website Pages')

@section('body')

<style>
.select2-container--default .select2-results__option[aria-selected="true"] {
  background-color: #009688;
	color:white;
}
.delete-btn{
  padding-left: 4px;
  /* margin-right: 30px; */
}
</style>

     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <div class="header-icon">
              <i class="fa fa-home"></i>
           </div>
           <div class="header-title">
              <h1>Employee</h1>
              <small>List of all Employee</small>
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
                             <h4>Employee List</h4>

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
                          <a class="btn btn-add" href="#" id="addEmployee" > <i class="fa fa-plus"></i> Add New Employee </a>
                        </div>
                      </div>
                       <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                       <div class="table-responsive">
                          <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                             <thead>
                                <tr class="info">
                                   <th>Image</th>
                                   <th>Name</th>
                                   <th>Email</th>
                                   <th>Phone</th>
                                   <th>Address</th>
                                   <th>National ID</th>
                                   <th>Designation</th>
                                   <th width="160px">Action</th>
                                </tr>
                             </thead>
                             <tbody>
                               @foreach($allemployee as $employee)
                              <tr>
                                  <td><img src="{{ URL::to('/') }}/public/backendimages/{{$employee->employee_image}}" class="img-circle" alt="User Image" width="50" height="50"></td>
                                  <td>{{$employee->employee_name}}</td>
                                  <td>{{$employee->employee_email}}</td>
                                  <td>{{$employee->employee_phone}}</td>
                                  <td>{{$employee->employee_address}}</td>
                                  <td>{{$employee->employee_nid}}</td>
                                  <td>{{$employee->employee_designation}}</td>                                
                                  <td>
                                    <a href="#" id="viewEmployee" class="btn btn-sm btn-info" data-id="{{$employee->employee_id}}"><i class="fa fa-eye"></i></a>
                                    <a href="#" id="editEmployee" class="btn btn-sm btn-warning" data-id="{{$employee->employee_id}}"><i class="fa fa-pencil"></i></a>
                                    {!! Form::open(['method'=>'post','url' => 'adminerpemployeedelete/{{$employee->employee_id}}','class'=>'col-sm-6 pull-right delete-btn','enctype'=>'multipart/form-data']) !!}
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                     <input type="hidden" name="employee_id" value="{{$employee->employee_id}}" >
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


	    <!--  Includeed Files -->
      @include('backend.erp.employee.modal.employeeadd')
      @include('backend.erp.employee.modal.employeeedit')
      @include('backend.erp.employee.modal.employeeview')

		</div>


  @endsection

  @section('script')
    <script type="text/javascript">

    $(document).on('click','#addEmployee',function(e){
      e.preventDefault();
      $('#employeeadd').modal('show');
    });

    $(document).on('click','#editEmployee',function(e){
      e.preventDefault();
      $('#employeeedit').modal('show');

      var id = $(this).data('id');
      $('#employeeedit form').attr('action','adminerpemployeeupdate/'+id);

      $.get('adminerpemployeeedit/'+id, function(data){

        $('#employeeedit #employee_name').val(data.employeedata.employee_name);
        $('#employeeedit #employee_email').val(data.employeedata.employee_email);
        $('#employeeedit #employee_phone').val(data.employeedata.employee_phone);
        $('#employeeedit #employee_address').val(data.employeedata.employee_address);
        $('#employeeedit #employee_nid').val(data.employeedata.employee_nid);
        $('#employeeedit #employee_image').attr('src','public/backendimages/'+data.employeedata.employee_image);
        $('#employeeedit #employee_designation').val(data.employeedata.employee_designation);
        $('#employeeedit #employee_details').val(data.employeedata.employee_details);

        console.log(data.employeedata);
      })
    });

    $(document).on('click','#viewEmployee',function(e){
      e.preventDefault();
      $('#employeeview').modal('show');

      var id = $(this).data('id');;

      $.get('adminerpemployeeview/'+id, function(data){

        $('#employeeview #employee_name').html(data.employeedata.employee_name);
        $('#employeeview #employee_email').html(data.employeedata.employee_email);
        $('#employeeview #employee_phone').html(data.employeedata.employee_phone);
        $('#employeeview #employee_address').html(data.employeedata.employee_address);
        $('#employeeview #employee_nid').html(data.employeedata.employee_nid);
        $('#employeeview #employee_image').attr('src','public/backendimages/'+data.employeedata.employee_image);
        $('#employeeview #employee_designation').html(data.employeedata.employee_designation);
        $('#employeeview #employee_details').html(data.employeedata.employee_details);

        console.log(data.employeedata);
      })
    });

    </script>
  @endsection
