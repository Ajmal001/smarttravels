<div class="modal fade" id="salessearchyear" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header modal-header-primary">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         <h3><i class="fa fa-search m-r-5"></i> Search Sales </h3>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="panel-body">

            {!! Form::open(['method'=>'post','url'=>'adminerpsalesyearsearch','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
            {!! csrf_field() !!}

            <div class="form-group">
              <label>Search Year</label>
              <select class="form-control" name="sales_search_year" id="sales_search_year" required>
                <option disabled selected>Select Year</option>
              </select>
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
