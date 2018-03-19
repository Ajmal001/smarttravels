@extends('backend.app')

@section('title', 'Admin Website Pages')

@section('body')

<style>
.select2-container--default .select2-results__option[aria-selected="true"] {
    background-color: #009688;
	color:white;
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
            								 <a class="btn btn-add" href="#" data-toggle="modal" data-target="#customeredit" > <i class="fa fa-plus"></i> Edit Customer </a>
            						   </div>

                           </div>
                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
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
                                       <td>{{$customer->customer_rating}}</td>
                                       <td>
                  										    <a class="btn btn-add btn-sm" href="adminerpcustomeredit/{{$customer->customer_id}}"><i class="fa fa-pencil"></i></a>
                  										    <a class="btn btn-danger btn-sm" href="adminerpcustomerdelete/{{$customer->customer_id}}"><i class="fa fa-trash-o"></i></a>

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
          @include('backend.erp.modal.customer')
          @include('backend.erp.modal.customeredit')




		</div>


  @endsection
