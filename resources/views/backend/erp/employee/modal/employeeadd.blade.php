<div class="modal fade" id="employeeadd" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header modal-header-primary">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
           <h3><i class="fa fa-user-circle m-r-5"></i> Add New Employee </h3>
        </div>

        <div class="modal-body">
           <div class="row">
             <div class="panel-body">

               {!! Form::open(['method'=>'post','url' => 'adminerpemployeeadd','class'=>'col-sm-10 col-sm-offset-1','enctype'=>'multipart/form-data']) !!}
               {!! csrf_field() !!}

              <div class="form-group">
                 <label>Name</label>
                 <input type="text" name="employee_name" class="form-control" placeholder="Enter Your Name" required>
              </div>

              <div class="form-group">
                 <label>Email</label>
                 <input type="text" name="email" class="form-control" placeholder="Enter Your Email">
              </div>

              <div class="form-group">
                 <input type="hidden" name="password" class="form-control" value="$2y$10$B33YQkaFhDHY9pQs4BhUdeKCSrRaLSkLzePGkBxlbYlyMJEpTrsJy">
              </div>

              <div class="form-group">
                 <label>Phone</label>
                 <input type="text" name="employee_phone" class="form-control" placeholder="Enter Your Phone">
              </div>

              <div class="form-group">
                 <label>Address</label>
                 <textarea name="employee_address" class="form-control" placeholder="Enter Your Address"></textarea>
              </div>

              <div class="form-group">
                 <label>National ID</label>
                 <input type="text" name="employee_nid" class="form-control" placeholder="Enter Your National ID">
              </div>

              <div class="form-group">
                <label>Employee Image</label>
                <input type="file" name="employee_image" class="form-control">
              </div>

              <div class="form-group">
                 <label>Designation</label>
                 <input type="text" name="employee_designation" class="form-control" placeholder="Enter Your Designation" required>
              </div>

              <div class="form-group">
                <label>Employee Status</label>
                <select class="form-control" name="status">
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
