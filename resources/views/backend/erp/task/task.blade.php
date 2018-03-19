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
              <h1>Tasks</h1>
              <small>List of all Tasks</small>
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
                             <h4>Task List</h4>

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
                          <a class="btn btn-add" href="#" data-toggle="modal" data-target="#addtask" > <i class="fa fa-plus"></i> Add New Task </a>
                        </div>
                      </div>
                       <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                       <div class="table-responsive">
                          <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                             <thead>
                                <tr class="info">
                                   <th>Title</th>
                                   <th>Date</th>
                                   <th>Assinged To</th>
                                   <th>Status</th>
                                   <th>Action</th>
                                </tr>
                             </thead>
                             <tbody>

                              @foreach($tasks as $task)
                              <tr>
                                 <td>{{$task->task_title}}</td>
                                 <td>{{$task->task_date}}</td>
                                 <td>
                                   @if($task->task_assigned_to)
                                    @foreach($employees as $employee)
                                      @if($employee->id == $task->task_assigned_to)
                                      {{$employee->name}}
                                      @endif
                                    @endforeach
                                   @endif
                                 </td>
                                 <td>
                                   @if($task->task_status == 1)
                                   <span class="label-success label label-default" style="font-size:8pt">Done</span>
                                   @else
                                   <span class="label-info label label-default" style="font-size:8pt">Pending</span>
                                   @endif
                                 </td>
                                 <td>
                                    <a class="btn btn-add btn-sm pull-left m-r-5" id="viewtaskbutton" href="#" data-tid="{{$task->task_id}}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-warning btn-sm pull-left m-r-5" id="edittaskbutton" href="#" data-tid="{{$task->task_id}}"><i class="fa fa-pencil"></i></a>

                                    {!! Form::open(['method'=>'post','url' => 'adminerptaskdelete/{{task->task_id}}','class'=>'pull-left','enctype'=>'multipart/form-data']) !!}
                                    {!! csrf_field() !!}
                                     <input type="hidden" name="task_id" value="{{$task->task_id}}" >
                                     <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                    {!! Form::close() !!}

                                 </td>
                              </tr>
                              @endforeach

                             </tbody>
                          </table>
                          {{ $tasks->links() }}
                       </div>
                    </div>
                 </div>
              </div>
           </div>


    <!--  Includeed Files -->
    @include('backend.erp.task.modal.taskadd')
    @include('backend.erp.task.modal.taskedit')
    @include('backend.erp.task.modal.taskview')

		</div>


  @endsection

  @section('script')

  <script type="text/javascript">
    $(document).on('click','#edittaskbutton', function(e){
      e.preventDefault();
      $('#edittask').modal('show');
      var cid = $(this).data('tid');
      $('#edittask form').attr("action", 'adminerptaskupdate/'+cid);
      $.get('adminerpedittask/'+cid, function(data){
        $('#task_title').val(data.taskdata.task_title);
        $('#task_date #minMaxExample2').val(data.taskdata.task_date);
        $('#task_assigned_to').val(data.taskdata.task_assigned_to);
        $('#task_details #summernote').summernote('code',data.taskdata.task_details);
      });
    });

    $(document).on('click','#viewtaskbutton', function(e){
      e.preventDefault();
      $('#taskview').modal('show');
      var cid = $(this).data('tid');
      $.get('adminerptaskview/'+cid, function(data){
        $('#taskview #task_title').html(data.taskdetails.task_title);
        $('#taskview #task_date').html(data.taskdetails.task_date);
        $('#taskview #task_assigned_to').html(data.taskdetails.task_assigned_to);
        $('#taskview #task_details').html(data.taskdetails.task_details);
      });
    });
  </script>

  @endsection
