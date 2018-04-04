<div class="modal fade" id="agentadd">
  <div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header modal-header-primary">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         <h3><i class="fa fa-user-circle m-r-5"></i> Add New Agent </h3>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="panel-body">

            {!! Form::open(['method'=>'post','url' => 'adminerpagentadd','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
            {!! csrf_field() !!}

            <div class="form-group">
              <label>Agent Name</label>
              <input type="text" name="name" class="form-control" placeholder="Enter Agent Name" required>
            </div>

            <div class="form-group">
              <label>Agent Email</label>
              <input type="email" name="email" class="form-control" placeholder="Enter Agent Email" required>
            </div>

            <div class="form-group">
              <label>Agent Password</label>
              <input type="password" name="password" class="form-control" placeholder="Enter Agent Password" required>
            </div>

            <div class="form-group">
              <label>Agent Phone</label>
              <input type="text" name="agent_phone" class="form-control" placeholder="Enter Agent Phone" required>
            </div>

            <div class="form-group">
              <label>Agent Area</label>
              <input type="text" name="agent_area" class="form-control" placeholder="Enter Agent Area" required>
            </div>

            <div class="form-group">
              <label></label>
              <input type="file" name="agent_image" class="form-control">
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
