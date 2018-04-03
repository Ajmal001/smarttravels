@extends('backend.app')

@section('title', 'Admin Website Pages')

@section('body')

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <div class="header-icon">
            <i class="fa fa-dollar"></i>
         </div>
         <div class="header-title">
            <h1>Currency</h1>
            <small></small>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="row">
            <!-- Form controls -->
            <div class="col-sm-12">
               <div class="panel panel-bd lobidrag">
                  <div class="panel-heading">
                     @if ($errors->any())
        								@foreach ($errors->all() as $error)
        									<span style="color:red">{{ $error }}</span>
        								@endforeach
        							@endif

        							@if(Session::has('flash_message_insert'))
        								<span style="color:green">{{ Session::get('flash_message_insert') }}</span>
        							@elseif(Session::has('flash_message_update'))
        								<span style="color:green">{{ Session::get('flash_message_update') }}</span>
        							@elseif(Session::has('flash_message_delete'))
        								<span style="color:red">{{ Session::get('flash_message_delete') }}</span>
        							@endif
                  </div>

                  <div class="panel-body">

                    <div class="row">
                    <div class="col-sm-12" style="border-bottom: 1px solid #ddd; margin-bottom: 15px;">
                    {!! Form::open(['method'=>'post','url' => 'adminwebsiteoptionscurrencyupdate','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
                    {!! csrf_field() !!}
                       <div class="form-group">
                          <label>Select Currency</label>
                          <select class="form-control" name="currency_id">
                              <option disabled>-Select Currency-</option>
                            @foreach($optionscurrency as $currency)
                              <option value="{{$currency->id}}">{{$currency->country}} ({{$currency->currency}})</option>
                            @endforeach
                          </select>
                       </div>
                       <div class="form-group">
                          <input type="submit" value="Save" class="btn btn-success" >
                       </div>
                   {!! Form::close() !!}
                   </div>

                   <div class="col-sm-12">
                    <div class="btn-group">
                     <div class="buttonexport" id="buttonlist">
                       <a class="btn btn-add" href="#" data-toggle="modal" data-target="#addcurrency" > <i class="fa fa-plus"></i> Add New Currency </a>
                     </div>
                   </div>

                    <div class="table-responsive">
                       <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                          <thead>
                             <tr class="info">
                                <th>ID</th>
                                <th>Country</th>
                                <th>Currency</th>
                                <th>Active</th>
                                <th>Action</th>
                             </tr>
                          </thead>
                          <tbody>

                           @foreach($optionscurrency as $currency)
                           <tr>
                              <td>{{$currency->id}}</td>
                              <td>{{$currency->country}}</td>
                              <td>{{$currency->currency}}</td>
                              <td>
                                @if($currency->selected == 1)
                                  <button type="button" class="btn btn-sm btn-success" style="pointer-events: none; cursor: default;">Selected</button>
                                @else
                                  {!! Form::open(['method'=>'post','url' => '/adminwebsiteoptionscurrencyupdate']) !!}
                                  {!! csrf_field() !!}
                                  <input type="hidden" name="currency_id" value="{{$currency->id}}" >
                                  <button type="submit" class="btn btn-warning btn-sm">Select</button>
                                  {!! Form::close() !!}
                                @endif
                              </td>
                              <td>
                                 {!! Form::open(['method'=>'post','url' => '/adminwebsiteoptionscurrencydelete','class'=>'pull-left','enctype'=>'multipart/form-data']) !!}
                                 {!! csrf_field() !!}
                                  <input type="hidden" name="id" value="{{$currency->id}}" >
                                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                 {!! Form::close() !!}
                              </td>
                           </tr>
                           @endforeach

                          </tbody>
                       </table>
                       {{-- $optionscurrency->links() --}}
                    </div>

      						</div>
      						</div>
      						</div>

                  </div>
               </div>
            </div>


          <!--  Add New Location -->
          <div class="modal fade" id="addcurrency" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header modal-header-primary">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h3><i class="fa fa-plane m-r-5"></i> Add Currency </h3>
                </div>

                <div class="modal-body">
                  <div class="row">
                    <div class="panel-body">

                    {!! Form::open(['method'=>'post','url' => 'adminwebsiteoptionscurrencyadd','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
                    {!! csrf_field() !!}

                    <div class="form-group">
                      <label>Country Name</label>
                      <input type="text" name="country" class="form-control" placeholder="Enter Country Name" required>
                    </div>

                    <div class="form-group">
                      <label>Country Currency</label>
                      <input type="text" name="currency" class="form-control" placeholder="Enter Country Currency" required>
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


         </div>
      </section>
      <!-- /.content -->


  @endsection
