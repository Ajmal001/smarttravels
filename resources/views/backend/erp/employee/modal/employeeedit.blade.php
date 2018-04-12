<div class="modal fade" id="employeeedit" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header modal-header-primary">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
           <h3><i class="fa fa-user-circle m-r-5"></i> Edit Employee </h3>
        </div>

        <div class="modal-body">
           <div class="row">
             <div class="panel-body">

               {!! Form::open(['method'=>'post','url' => '','class'=>'col-sm-10 col-sm-offset-1','enctype'=>'multipart/form-data']) !!}
               {!! csrf_field() !!}
               {!! method_field('PUT') !!}

              <div class="form-group">
                 <label>Name</label>
                 <input type="text" name="employee_name" class="form-control" id="employee_name" required>
              </div>

              <div class="form-group">
                 <label>Email</label>
                 <input type="text" name="email" class="form-control" id="email">
              </div>

              <div class="form-group">
                 <label>Phone</label>
                 <input type="text" name="employee_phone" class="form-control" id="employee_phone">
              </div>

              <div class="form-group">
                 <label>Address</label>
                 <textarea name="employee_address" class="form-control" id="employee_address"></textarea>
              </div>

              <div class="form-group">
                 <label>National ID</label>
                 <input type="text" name="employee_nid" class="form-control" id="employee_nid">
              </div>

              <div class="form-group">
                <label>Employee Image</label>
                <input type="file" name="employee_image" class="form-control">
                <img src="" alt="" id="employee_image" width="100">
              </div>

              <div class="form-group">
                 <label>Designation</label>
                 <input type="text" name="employee_designation" class="form-control" id="employee_designation" required>
              </div>

              <div class="form-group">
                <label>Employee Status</label>
                <select class="form-control" name="status" id="employee_status">
                  <option value="" disabled selected>Select Status</option>
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
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
