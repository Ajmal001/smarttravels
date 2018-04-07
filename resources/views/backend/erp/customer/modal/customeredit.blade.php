<div class="modal fade" id="customeredit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header modal-header-primary">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         <h3><i class="fa fa-users m-r-5"></i> Edit Customer </h3>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="panel-body">

            {!! Form::open(['method'=>'post','url' => '','class'=>'col-sm-6','id'=>'editCustomer','enctype'=>'multipart/form-data']) !!}
            {!! csrf_field() !!}
            {!! method_field('PUT') !!}
            <div class="form-group">
              <label>Customer Name</label>
              <input type="text" name="customer_name" class="form-control" id="customer_name" required>
            </div>
            <div class="form-group">
              <label>Customer Email</label>
              <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
              <label>Customer Phone</label>
              <input type="text" name="customer_phone" class="form-control" id="customer_phone" required>
            </div>
            <div class="form-group">
              <label>Customer Address</label>
              <textarea name="customer_address" class="form-control" id="customer_address" required></textarea>
            </div>
            <div class="form-group">
              <label>Customer National ID</label>
              <input type="text" name="customer_nid" class="form-control" id="customer_nid">
            </div>
            <div class="form-group">
              <label>Customer Passport Number</label>
              <input type="text" name="customer_passport_no" class="form-control" id="customer_passport_no">
            </div>
            <div class="form-group">
              <label>Customer Image</label>
              <input type="file" name="customer_image" class="form-control"> <br>
              <img src="" alt="" id="customer_image_preview" width="100">
            </div>
            <div class="form-group">
              <label>Customer Facebook URL</label>
              <input type="text" name="customer_facebook" class="form-control" id="customer_facebook">
            </div>
            <div class="form-group">
              <label>Customer LinkedIn URL</label>
              <input type="text" name="customer_linkedin" class="form-control" id="customer_linkedin">
            </div>
            <div class="form-group">
              <label>Customer Profession</label>
              <input type="text" name="customer_profession" class="form-control" id="customer_profession">
            </div>
            <div class="form-group">
              <label>Customer Company Name</label>
              <input type="text" name="customer_company" class="form-control" id="customer_company">
            </div>
            <div class="form-group">
              <label>Customer City</label>
              <input type="text" name="customer_city" class="form-control" id="customer_city">
            </div>
            <div class="form-group">
              <label>Customer Country</label>
              <input type="text" name="customer_country" class="form-control" id="customer_country">
            </div>
            <div class="form-group">
              <label>Customer City Zip Code</label>
              <input type="text" name="customer_zip" class="form-control" id="customer_zip">
            </div>
            <div class="form-group">
              <label>Customer Source</label>
              <select class="form-control" name="customer_source" id="customer_source">
                <option value="" disabled selected>Select Source</option>
                <option value="facebook">Facebook</option>
                <option value="linkedin">LinkedIn</option>
                <option value="email">Email</option>
                <option value="website">Website</option>
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
