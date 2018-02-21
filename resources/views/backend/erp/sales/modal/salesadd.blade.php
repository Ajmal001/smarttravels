<div class="modal fade" id="salesadd" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header modal-header-primary">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
           <h3><i class="fa fa-plane m-r-5"></i> Add New Sales </h3>
        </div>

        <div class="modal-body">
           <div class="row">
             <div class="panel-body">

               {!! Form::open(['method'=>'post','url' => 'adminerpsalesadd','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
               {!! csrf_field() !!}

             <div class="form-group">
              <label>Item Type</label>
              <div class="form-group">
               <select class="form-control" name="sales_item_type">
                 <option disabled selected>Select Type</option>
                 <option value="visa_processing">Visa Processing</option>
                 <option value="tour_packages">Tour Packages</option>
                 <option value="hotels">Hotels</option>
                 <option value="sight_seeing">Sight Seeing</option>
                 <option value="air_tickets">Air Tickets</option>
                 <option value="consultancy">Consultancy</option>
                 <option value="others">Others</option>
               </select>
              </div>
             </div>


              <div class="form-group">
                 <label>Item Name</label>
                 <input type="text" name="sales_item_name" class="form-control" id="sales_item_name" required>
              </div>

              <div class="form-group">
                 <label>SKU</label>
                 <input type="text" name="sales_sku" class="form-control" placeholder="Enter Sales SKU" required>
              </div>

              <div class="form-group">
                <label>Customer Name</label>
                <div class="form-group">
                <select class="js-example-basic-multiple" name="sales_customer_id" style="width:200px;" required>
                  <option disabled selected>Select Employee</option>
                  @foreach($customers as $customer)
                  <option value="{{$customer->customer_id}}">{{$customer->customer_name}}</option>
                  @endforeach
                </select>
                </div>
              </div>

              <div class="form-group">
               <label>Seller Type</label>
               <div class="form-group">
                <select class="form-control" name="sales_by_type" id="sellerTypeDropDown">
                  <option disabled selected>Select Type</option>
                  <option value="Employee">Employee</option>
                  <option value="Agent">Agent</option>
                </select>
               </div>
              </div>

              <div class="form-group">
               <label>Seller Name</label>
               <div class="form-group">
                <select class="form-control" name="sales_by_id" id="sellerTypeNameDropDown">
                  <option disabled selected>Select Name</option>
                </select>
               </div>
              </div>

              <div class="form-group">
                 <label>Payment Type</label>
                 <select class="form-control" name="payment_type" >
                   <option disabled selected>Select Type</option>
                   <option value="cash">Cash</option>
                   <option value="due">Due</option>
                 </select>
              </div>

              <div class="form-group">
                 <label>Payment Method</label>
                 <select class="form-control" name="payment_method" >
                   <option disabled selected>Select Method</option>
                   <option value="bank">Bank</option>
                   <option value="check">Check Payment</option>
                   <option value="paypal">Paypal</option>
                   <option value="card">Card Payment</option>
                 </select>
              </div>

              <div class="form-group">
                 <label>Payment Info</label>
                 <input type="text" name="payment_info" class="form-control" placeholder="Enter Transaction Number" >
              </div>

              <div class="form-group">
                 <label>Price</label>
                 <input type="number" name="sales_price" class="form-control" placeholder="Enter Price" required>
              </div>

              <div class="form-group">
                 <label>Date</label>
                 <div class="input-group date form_date" >
                    <input id='minMaxExample' type="text" name="sales_date" style="z-index: 1050 !important;" class="form-control years"><span class="input-group-addon"><a href="#"><i class="fa fa-calendar"></i></a></span>
                 </div>
              </div>

              <div class="form-group">
               <label>Rating</label>
               <div id="addcustomerrating"></div>
               <div class="counter"></div>
               <input type="hidden" name="sales_customer_rating" id="sales_customer_rating">
              </div>

              <br>
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
