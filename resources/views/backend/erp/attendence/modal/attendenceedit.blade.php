<div class="modal fade" id="employeeattendenceedit" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header modal-header-primary">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
           <h3><i class="fa fa-plane m-r-5"></i> Edit Employee Attendence </h3>
        </div>

        <div class="modal-body">
           <div class="row">
             <div class="panel-body">

               {!! Form::open(['method'=>'post','url' => '','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
               {!! csrf_field() !!}
               {!! method_field('PUT') !!}

               <div class="form-group">
                  <label>Employee ID</label>
                  <select class="form-control" name="employee_id" id="employee_id">
                    @foreach($allemployee as $employee)
                    <option value="{{$employee->employee_id}}">{{$employee->employee_name}}</option>
                    @endforeach
                  </select>
               </div>

               <div class="form-group">
                  <label>Date</label>
                  <div class="input-group date form_date" id="attendenceDate">
                     <input id='minMaxExample2' type="text" name="date" style="z-index: 1050 !important;" class="form-control years"><span class="input-group-addon"><a href="#"><i class="fa fa-calendar"></i></a></span>
                  </div>
               </div>

               <div class="form-group">
                  <label>Time IN</label>
                  <input type="time" name="in_time" id="in_time" class="form-control">
               </div>

               <div class="form-group">
                  <label>Time Out</label>
                  <input type="time" name="out_time" id="out_time" class="form-control">
               </div>

               <div class="form-group">
                  <label>Note</label>
                  <input type="text" name="note" id="note" class="form-control">
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
