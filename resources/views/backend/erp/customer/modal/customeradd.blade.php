<div class="modal fade" id="package" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header modal-header-primary">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         <h3><i class="fa fa-users m-r-5"></i> Add New Customer </h3>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="panel-body">

            {!! Form::open(['method'=>'post','url' => 'adminerpcustomercreate','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
            {!! csrf_field() !!}
            <div class="form-group">
              <label>Customer Name</label>
              <input type="text" name="customer_name" class="form-control" placeholder="Enter Customer Name" required>
            </div>
            <div class="form-group">
              <label>Customer Email</label>
              <input type="email" name="email" class="form-control" placeholder="Enter Customer Email" required>
            </div>
            <div class="form-group">
               <input type="hidden" name="password" class="form-control" value="$2y$10$B33YQkaFhDHY9pQs4BhUdeKCSrRaLSkLzePGkBxlbYlyMJEpTrsJy">
            </div>
            <div class="form-group">
              <label>Customer Phone</label>
              <input type="text" name="customer_phone" class="form-control" placeholder="Enter Customer Phone" required>
            </div>
            <div class="form-group">
              <label>Customer Address</label>
              <textarea name="customer_address" class="form-control" placeholder="Enter Your Address" required></textarea>
            </div>
            <div class="form-group">
              <label>Customer National ID</label>
              <input type="text" name="customer_nid" class="form-control" placeholder="Enter Your National ID">
            </div>
            <div class="form-group">
              <label>Customer Passport Number</label>
              <input type="text" name="customer_passport_no" class="form-control" placeholder="Enter Your Passport Number">
            </div>
            <div class="form-group">
              <label>Customer Image</label>
              <input type="file" name="customer_image" class="form-control">
            </div>
            <div class="form-group">
              <label>Customer Facebook URL</label>
              <input type="text" name="customer_facebook" class="form-control" placeholder="Enter Your Facebook URL">
            </div>
            <div class="form-group">
              <label>Customer LinkedIn URL</label>
              <input type="text" name="customer_linkedin" class="form-control" placeholder="Enter Your LinkedIn URL">
            </div>
            <div class="form-group">
              <label>Customer Profession</label>
              <input type="text" name="customer_profession" class="form-control" placeholder="Enter Your Profession">
            </div>
            <div class="form-group">
              <label>Customer Company Name</label>
              <input type="text" name="customer_company" class="form-control" placeholder="Enter Your Company Name">
            </div>
            <div class="form-group">
              <label>Customer City</label>
              <input type="text" name="customer_city" class="form-control" placeholder="Enter Your City">
            </div>
            <div class="form-group">
              <label>Customer Country</label>
              <input type="text" name="customer_country" class="form-control" placeholder="Enter Your Country">
            </div>
            <div class="form-group">
              <label>Customer City Zip Code</label>
              <input type="text" name="customer_zip" class="form-control" placeholder="Enter Your City Zip Code">
            </div>
            <div class="form-group">
              <label>Customer Source</label>
              <select class="form-control" name="customer_source">
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
