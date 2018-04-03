<!--  Add New Tour Expense -->
<div class="modal fade" id="expenseEdit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header modal-header-primary">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
           <h3><i class="fa fa-calculator m-r-5"></i> Edit Expense </h3>
        </div>

        <div class="modal-body">
           <div class="row">
             <div class="panel-body">

               {!! Form::open(['method'=>'post','url' => 'adminerpexpensesupdate','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
               {!! csrf_field() !!}
               {!! method_field('PUT') !!}

                <div class="form-group">
                <label>Expense Type</label>
                  <div class="form-group">
                   <select class="form-control" name="expense_type" id="expense_type" required>
                     <option disabled selected>Select Type</option>
                     <option value="rent">Rent</option>
                     <option value="salary">Salary</option>
                     <option value="food_entertainment">Food & Entertainment</option>
                     <option value="furniture_stationary">Furniture & Stationary</option>
                     <option value="repair_maintenance">Repair & Maintenance</option>
                     <option value="telephone">Telephone</option>
                     <option value="utilities">Utilities</option>
                     <option value="depreciation">Depreciation</option>
                     <option value="commission_discounts">Commission & Discounts</option>
                     <option value="marketing_advertising">Marketing & Advertising</option>
                     <option value="training_fees">Training Fees</option>
                     <option value="legal_fees">Legal Fees</option>
                     <option value="convences">Convences</option>
                     <option value="office_tour">Office Tour</option>
                     <option value="others">Others</option>
                   </select>
                  </div>
                </div>

                <div class="form-group">
                   <label>Expense Title</label>
                   <input type="text" id="expense_title" name="expense_title" class="form-control" placeholder="Enter Expense Title" required>
                </div>

                <div class="form-group">
                   <label>Amount</label>
                   <input type="text" id="expense_amount" name="expense_amount" class="form-control" placeholder="Enter Amount" required>
                </div>

                <div class="form-group">
                   <label>Date</label>
                   <div class="input-group date form_date" id="expense_date">
                      <input id='minMaxExample2' type="text" name="expense_date" style="z-index: 1050 !important;" class="form-control years"><span class="input-group-addon"><a href="#"><i class="fa fa-calendar"></i></a></span>
                   </div>
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
