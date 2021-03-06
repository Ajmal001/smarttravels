<!--  Edit Task -->
<div class="modal fade" id="edittask">
  <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header modal-header-primary">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
           <h3><i class="fa fa-clipboard m-r-5"></i> Edit Task </h3>
        </div>

        <div class="modal-body">
           <div class="row">
             <div class="panel-body">

               {!! Form::open(['method'=>'post','url' => '','class'=>'col-sm-12','enctype'=>'multipart/form-data']) !!}
               {!! csrf_field() !!}
               {!! method_field('PUT') !!}

              <div class="form-group">
                 <label>Task Title</label>
                 <input type="text" name="task_title" class="form-control" id="task_title" required>
              </div>

              <div class="form-group">
                 <label>Date</label>
                 <div class="input-group date form_date" id="task_date">
                    <input id='minMaxExample2' type="text" name="task_date" style="z-index: 1050 !important;" class="form-control years"><span class="input-group-addon"><a href="#"><i class="fa fa-calendar"></i></a></span>
                 </div>
              </div>

              <div class="form-group">
                <label>Assinged To</label>
                <div class="form-group">
                 <select class="js-example-basic-multiple" id="task_assigned_to" name="task_assigned_to" style="width:200px;" required>
                   @foreach($employees as $employee)
                   <option value="{{$employee->employee_id}}">{{$employee->employee_name}}</option>
                   @endforeach
                 </select>
                </div>
              </div>

              <div class="form-group">
                 <label>Task Status</label>
                 <select class="form-control" name="task_status" required>
                   <option selected disabled>Select Status</option>
                   <option value="0">Pending</option>
                   <option value="1">Done</option>
                 </select>
              </div>

              <div class="form-group" id="task_details">
                 <label>Task details</label>
                 <textarea class="form-control" id="summernote" name="task_details" rows="3"></textarea>
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
