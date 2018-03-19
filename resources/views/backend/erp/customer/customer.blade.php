@extends('backend.app')

@section('title', 'Admin Website Pages')

@section('body')

<style>
  .select2-container--default .select2-results__option[aria-selected="true"] {
    background-color: #009688;
  	color:white;
  }
  .delete-btn{
    padding-left: 4px;
  }
</style>

         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-home"></i>
               </div>
               <div class="header-title">
                  <h1>Customers</h1>
                  <small>List of All Customer</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>Customer List</h4>

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
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                             <div class="buttonexport" id="buttonlist">
            								 <a class="btn btn-add" href="#" data-toggle="modal" data-target="#package" > <i class="fa fa-plus"></i> Add New Customer </a>
            						   </div>

                           </div>
                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                             {{var_dump($customers)}}
                           </div>

                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Image</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Phone</th>
                                       <th>Country</th>
                                       <th>Rating</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   @foreach($allcustomer as $customer)
                                    <tr>
                                       <td><img src="{{ URL::to('/') }}/public/backendimages/{{$customer->customer_image}}" class="img-circle" alt="User Image" width="50" height="50"> </td>
                                       <td>{{$customer->customer_name}}</td>
                                       <td>{{$customer->customer_email}}</td>
                                       <td>{{$customer->customer_phone}}</td>
                                       <td>{{$customer->customer_country}}</td>
                                       <td>
                                          <a id="customerView" class="btn btn-add btn-sm" href="#" data-id="{{$customer->customer_id}}"> <i class="fa fa-eye"></i></a>
                                          <a id="customerEdit" class="btn btn-warning btn-sm" href="#" data-id="{{$customer->customer_id}}"> <i class="fa fa-pencil"></i></a>
                                          {!! Form::open(['method'=>'post','url' => 'adminerpcustomerdelete/{{$customer->customer_id}}','class'=>'col-sm-6 pull-right delete-btn','id'=>'deleteCustomer','enctype'=>'multipart/form-data']) !!}
                                          {!! csrf_field() !!}
                                           <input type="hidden" name="customer_id" value="{{$customer->customer_id}}" >
                                           <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                          {!! Form::close() !!}

                                      </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

			    <!--  Add New Tour Package -->
          @include('backend.erp.customer.modal.customeradd')
          @include('backend.erp.customer.modal.customeredit')
          @include('backend.erp.customer.modal.customerview')


		</div>

  @endsection

  @section('script')
    <script type="text/javascript">
      $(document).on('click','#customerEdit', function(e){
        e.preventDefault();
        $('#customeredit').modal('show');
        var cid = $(this).data('id');
        $('#editCustomer').attr("action", 'adminerpcustomerupdate/'+cid);
        $.get('adminerpcustomeredit/'+cid, function(data){
          $('#customer_name').val(data.customerdata.customer_name);
          $('#customer_email').val(data.customerdata.customer_email);
          $('#customer_phone').val(data.customerdata.customer_phone);
          $('#customer_address').val(data.customerdata.customer_address);
          $('#customer_nid').val(data.customerdata.customer_nid);
          $('#customer_passport_no').val(data.customerdata.customer_passport_no);
          $('#customer_facebook').val(data.customerdata.customer_facebook);
          $('#customer_linkedin').val(data.customerdata.customer_linkedin);
          $('#customer_profession').val(data.customerdata.customer_profession);
          $('#customer_company').val(data.customerdata.customer_company);
          $('#customer_city').val(data.customerdata.customer_city);
          $('#customer_country').val(data.customerdata.customer_country);
          $('#customer_zip').val(data.customerdata.customer_zip);
          // $('#customer_rating').val(data.customerdata.customer_rating);
          $('#customer_image_preview').attr("src", 'public/backendimages/'+data.customerdata.customer_image);
          $('#customer_source').val(data.customerdata.customer_source);
        });
      });

      $(document).on('click','#customerView', function(e){
        e.preventDefault();
        $('#customerview').modal('show');
        var cid = $(this).data('id');
        $.get('adminerpcustomershow/'+cid, function(data){
          $('#customer-view-table #customer_name').html(data.customerdata.customer_name);
          $('#customer-view-table #customer_email').html(data.customerdata.customer_email);
          $('#customer-view-table #customer_phone').html(data.customerdata.customer_phone);
          $('#customer-view-table #customer_address').html(data.customerdata.customer_address);
          $('#customer-view-table #customer_nid').html(data.customerdata.customer_nid);
          $('#customer-view-table #customer_passport_no').html(data.customerdata.customer_passport_no);
          $('#customer-view-table #customer_facebook').html(data.customerdata.customer_facebook);
          $('#customer-view-table #customer_linkedin').html(data.customerdata.customer_linkedin);
          $('#customer-view-table #customer_profession').html(data.customerdata.customer_profession);
          $('#customer-view-table #customer_company').html(data.customerdata.customer_company);
          $('#customer-view-table #customer_city').html(data.customerdata.customer_city);
          $('#customer-view-table #customer_country').html(data.customerdata.customer_country);
          $('#customer-view-table #customer_zip').html(data.customerdata.customer_zip);
          // $('#customer-view-table #customer_rating').html(data.customerdata.customer_rating);
          $('#customer-view-table #customer_image_preview').attr("src", 'public/backendimages/'+data.customerdata.customer_image);
          $('#customer-view-table #customer_source').html(data.customerdata.customer_source);
          console.log(data.customerdata.customer_name);
        });
      });
    </script>
  @endsection
