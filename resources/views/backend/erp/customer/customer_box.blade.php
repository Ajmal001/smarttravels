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

<style>

    .cardbox_user{
        -moz-box-shadow: 0 0 5px #888;
        -webkit-box-shadow: 0 0 5px #888;
        box-shadow: 0 0 5px #888;
        color: #e4e5e7;
        cursor: pointer;
        background-color: #009688;
        height: 220px;
        margin-bottom: 25px;
        border-radius: 4px;
        text-align: center;
    }
    .cardbox_user_main {
        position: relative;
    }
    .cardbox_user_hover {
        display: none;
        -webkit-transition: all 0.3s ease-in;
        -moz-transition: all 0.3s ease-in;
        transition: all 0.3s ease-in;
    }
    .cardbox_user_main:hover .cardbox_user_hover {
        background-color: rgba(1, 10, 15, 0.85);
        position: absolute;
        display: block;
        border-radius: 4px;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    .user_image{
        background-size: cover;
        background-position: center;
        width: 130px;
        height: 130px;
        border: 3px solid;
        border-radius: 50%;
        margin-left: auto;
        margin-right: auto;
        margin-top: 20px;
        margin-bottom: 10px;
    }
    .cardbox_user_links {
        background: transparent;
        left: 50%;
        top: 50%;
        position: absolute;
        margin-left: -54px;
        margin-top: -15px;
        width:100%;
    }
    .statistic-box h3 {
    font-size: 15px;
    }
</style>

         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
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
                                <button type="button" class="btn btn-add" id="customersearchbutton"><i class="fa fa-search"></i> Search</button>
            						     </div>
                           </div>
                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="row">
                             @foreach($allcustomer as $customer)
                             <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                 <div class="cardbox_user_main">
                                     <div class="cardbox_user">
                                         <div class="statistic-box">
                                             <div class="user_image" style="background-image:url('{{ URL::to('/') }}/public/backendimages/{{$customer->customer_image}}');"></div>
                                            <h3>{{$customer->customer_name}}</h3>
                                         </div>
                                     </div>
                                     <div class="cardbox_user_hover">
                                         <div class="cardbox_user_links">
                                             <a id="customerView" class="btn btn-add btn-sm pull-left m-r-5" href="#" data-id="{{$customer->customer_id}}"> <i class="fa fa-eye"></i></a>
                                             <a id="customerEdit" class="btn btn-warning btn-sm pull-left m-r-5" href="#" data-id="{{$customer->customer_id}}"> <i class="fa fa-pencil"></i></a>
                                             {!! Form::open(['method'=>'post','url' => 'adminerpcustomerdelete/{{$customer->customer_id}}','class'=>'','id'=>'deleteCustomer','enctype'=>'multipart/form-data']) !!}
                                             {!! csrf_field() !!}
                                              <input type="hidden" name="customer_id" value="{{$customer->customer_id}}" >
                                              <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                             {!! Form::close() !!}
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             @endforeach
                           </div>

                           {{ $allcustomer->links() }}

                        </div>
                     </div>
                  </div>
               </div>

			    <!--  Add New Tour Package -->
          @include('backend.erp.customer.modal.customeradd')
          @include('backend.erp.customer.modal.customeredit')
          @include('backend.erp.customer.modal.customerview')
          @include('backend.erp.customer.modal.customersearch')


		</div>

  @endsection

  @section('script')
    <script type="text/javascript">

      $(document).on('click','#customersearchbutton', function(e){
        e.preventDefault();
        $('#customersearch').modal('show');
      });

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
          $('#customer_rating').val(data.customerdata.customer_rating);
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
          var $viewcustomerrating = $("#customer-view-table #customer_rating").rateYo();
          $viewcustomerrating.rateYo("rating", data.avg_rating);
          $viewcustomerrating.rateYo("option", "readOnly", true);
          $viewcustomerrating.rateYo("option", "starWidth", "30px");
          $('#customer-view-table #customer_image_preview').attr("src", 'public/backendimages/'+data.customerdata.customer_image);
          $('#customer-view-table #customer_source').html(data.customerdata.customer_source);
          // console.log(data);
        });
      });
    </script>
  @endsection
