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
              <i class="fa fa-thumbs-up"></i>
           </div>
           <div class="header-title">
              <h1>Attendence</h1>
              <small>List of all Employee Attendence</small>
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
                             <h4>Employee Attendence List</h4>

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
                          <a class="btn btn-add" href="#" id="addEmployeeAttendence" > <i class="fa fa-plus"></i> Add New Attendence </a>
                        </div>
                      </div>
                       <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                       <div class="table-responsive">
                          <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                             <thead>
                                <tr class="info">
                                   <th>Employee</th>
                                   <th>Date</th>
                                   <th>IN Time</th>
                                   <th>OUT Time</th>
                                   <th>Note</th>
                                   <th>Action</th>
                                </tr>
                             </thead>
                             <tbody>
                               @foreach($allattendence as $attendence)
                              <tr>
                                  <td>{{$attendence->employee->employee_name}}</td>
                                  <td>{{$attendence->date}}</td>
                                  <td>{{$attendence->in_time}}</td>
                                  <td>{{$attendence->out_time}}</td>
                                  <td>{{$attendence->note}}</td>
                                  <td>
                                    <a href="#" id="editEmployeeAttendence" class="btn btn-sm btn-add pull-left m-r-5" data-id="{{$attendence->attendence_id}}"><i class="fa fa-pencil"></i></a>
                                    {!! Form::open(['method'=>'post','url' => 'adminerpemployeeattendencedelete/{{$attendence->attendence_id}}','class'=>'pull-left','enctype'=>'multipart/form-data']) !!}
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                     <input type="hidden" name="attendence_id" value="{{$attendence->attendence_id}}" >
                                     <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                    {!! Form::close() !!}
                                  </td>
                              </tr>
                              @endforeach
                             </tbody>
                          </table>
                          {{ $allattendence->links() }}
                       </div>
                    </div>
                 </div>
              </div>
           </div>


	    <!--  Includeed Files -->
      @include('backend.erp.attendence.modal.attendenceadd')
      @include('backend.erp.attendence.modal.attendenceedit')

		</div>


  @endsection

  @section('script')
    <script type="text/javascript">

      $(document).on('click','#addEmployeeAttendence',function(e){
        e.preventDefault();
        $('#employeeattendanceadd').modal('show');
      });

      $(document).on('click','#editEmployeeAttendence',function(e){
        e.preventDefault();
        $('#employeeattendenceedit').modal('show');

        var id = $(this).data('id');
        $('#employeeattendenceedit form').attr('action','adminerpemployeeattendenceupdate/'+id);

        $.get('adminerpemployeeattendenceedit/'+id, function(data){

          $('#employeeattendenceedit #employee_id').val(data.attendencedata.employee_id);
          $('#employeeattendenceedit #attendenceDate #minMaxExample2').val(data.attendencedata.date);
          $('#employeeattendenceedit #in_time').val(data.attendencedata.in_time);
          $('#employeeattendenceedit #out_time').val(data.attendencedata.out_time);
          $('#employeeattendenceedit #note').val(data.attendencedata.note);

          // console.log(data.attendencedata);
        })
      });

    </script>
  @endsection
