<div class="modal fade" id="employeeedit" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header modal-header-primary">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
           <h3><i class="fa fa-plane m-r-5"></i> Edit Employee </h3>
        </div>

        <div class="modal-body">
           <div class="row">
             <div class="panel-body">

               {!! Form::open(['method'=>'post','url' => '','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
               {!! csrf_field() !!}
               {!! method_field('PUT') !!}

              <div class="form-group">
                 <label>Name</label>
                 <input type="text" name="employee_name" class="form-control" id="employee_name" required>
              </div>

              <div class="form-group">
                 <label>Email</label>
                 <input type="text" name="employee_email" class="form-control" id="employee_email">
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

<style>
.rate-area {
  float: right;
  border-style: none;
  margin-right:73px;
}

.rate-area:not(:checked) > input {
  position: absolute;
  top: -9999px;
  clip: rect(0,0,0,0);
}

.rate-area:not(:checked) > label {
  float: right;
  width: 1em;
  padding: 0 .1em;
  overflow: hidden;
  white-space: nowrap;
  cursor: pointer;
  font-size: 200%;
  line-height: 1.2;
  color: lightgrey;
  text-shadow: 1px 1px #bbb;
}

.rate-area:not(:checked) > label:before { content: '★ '; }

.rate-area > input:checked ~ label {
  color: gold;
  text-shadow: 1px 1px #c60;
  font-size: 200% !important;
}

.rate-area:not(:checked) > label:hover, .rate-area:not(:checked) > label:hover ~ label { color: gold; }

.rate-area > input:checked + label:hover, .rate-area > input:checked + label:hover ~ label, .rate-area > input:checked ~ label:hover, .rate-area > input:checked ~ label:hover ~ label, .rate-area > label:hover ~ input:checked ~ label {
  color: gold;
  text-shadow: 1px 1px goldenrod;
}

.rate-area > label:active {
  position: relative;
  top: 2px;
  left: 2px;
}
</style>
