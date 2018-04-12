<div class="modal fade" id="agentedit">
  <div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header modal-header-primary">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         <h3><i class="fa fa-user-circle m-r-5"></i> Edit Agents </h3>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="panel-body">

            {!! Form::open(['method'=>'post','url' => '','class'=>'col-sm-10 col-sm-offset-1','enctype'=>'multipart/form-data']) !!}
            {!! csrf_field() !!}
            {!! method_field('PUT') !!}

            <div class="form-group">
              <label>Agent Name</label>
              <input type="text" name="name" class="form-control" id="agent_name" required>
            </div>

            <div class="form-group">
              <label>Agent Email</label>
              <input type="email" name="email" class="form-control" id="agent_email" required>
            </div>

            <div class="form-group">
              <label>Agent Phone</label>
              <input type="text" name="agent_phone" class="form-control" id="agent_phone" required>
            </div>

            <div class="form-group">
              <label>Agent Area</label>
              <input type="text" name="agent_area" class="form-control" id="agent_area" required>
            </div>

            <div class="form-group">
              <label>Agent Image</label>
              <input type="file" name="agent_image" class="form-control"> <br>
              <img src="" id="agent_image" width="150px"/>
            </div>

            <div class="form-group">
              <label>Agent Status</label>
              <select class="form-control" name="status" id="agent_status">
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
