<div class="modal fade" id="customersearch" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header modal-header-primary">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         <h3><i class="fa fa-search m-r-5"></i> Search Customer </h3>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="panel-body">

            {!! Form::open(['method'=>'get','url' => 'adminerpcustomersearch','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
            {!! csrf_field() !!}

            <div class="form-group">
              <label>Search Type</label>
              <select class="form-control" name="customer_type" required>
                <option value="" disabled selected>Select Type</option>
                <option value="customer_name">Customer Name</option>
                <option value="customer_phone">Customer Mobile</option>
                <option value="customer_passport_no">Customer Passport No</option>
              </select>
            </div>

            <div class="form-group">
              <label>Enter Value</label>
              <input type="text" placeholder="Enter the value here" name="customer_item" class="form-control" required>
            </div>

            <div class="form-group">
              <input type="submit" value="Search" class="btn btn-success" >
            </div>
            {!! Form::close() !!}

          </div>
        </div>
      </div>
<!-- /.modal-dialog -->
    </div>
  </div>
</div>
