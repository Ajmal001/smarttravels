<!--  Add New Task -->
<div class="modal fade" id="addtask" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header modal-header-primary">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
           <h3><i class="fa fa-plane m-r-5"></i> Add New Task </h3>
        </div>

        <div class="modal-body">
           <div class="row">
             <div class="panel-body">

               {!! Form::open(['method'=>'post','url' => 'adminerpaddtask','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
               {!! csrf_field() !!}
              <div class="form-group">
                 <label>Task Title</label>
                 <input type="text" name="task_title" class="form-control" placeholder="Enter Task Title" required>
              </div>

              <div class="form-group">
                 <label>Task Date</label>
                 <div class="input-group date form_date" >
                    <input id='minMaxExample' type="text" name="task_date" style="z-index: 1050 !important;" class="form-control years"><span class="input-group-addon"><a href="#"><i class="fa fa-calendar"></i></a></span>
                 </div>
              </div>

              <div class="form-group">
              <label>Assinged To</label>
               <select class="js-example-basic-multiple" name="task_assigned_to" style="width:200px;" required>
                 <option disabled selected>Select Employee</option>
                 @foreach($employees as $employee)
                 <option value="{{$employee->id}}">{{$employee->name}}</option>
                 @endforeach
               </select>
              </div>

              <div class="form-group">
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
