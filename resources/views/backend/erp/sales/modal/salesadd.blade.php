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
               <select class="js-example-basic-multiple" name="sales_customer_id" style="width:200px;" required>
                 <option disabled selected>Select Employee</option>
                 @foreach($customers as $customer)
                 <option value="{{$customer->customer_id}}">{{$customer->customer_name}}</option>
                 @endforeach
               </select>
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
               <div class="form-group">
                <select class="form-control" name="sales_customer_rating" id="sales_customer_rating">
                  <option disabled selected>Rating for this Customer</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
               </div>
              </div>

              {{--<div class="form-group">
               <label>Rating</label>
               <div class="form-group">

                <ul class="rate-area">
                  <input type="radio" id="5-star" name="rating" value="5" /><label for="5-star" title="Amazing">5 stars</label>
                  <input type="radio" id="4-star" name="rating" value="4" /><label for="4-star" title="Good">4 stars</label>
                  <input type="radio" id="3-star" name="rating" value="3" /><label for="3-star" title="Average">3 stars</label>
                  <input type="radio" id="2-star" name="rating" value="2" /><label for="2-star" title="Not Good">2 stars</label>
                  <input type="radio" id="1-star" name="rating" value="1" /><label for="1-star" title="Bad">1 star</label>
                </ul>

               </div>
              </div>--}}
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
