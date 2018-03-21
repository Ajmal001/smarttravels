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
          <h1>Messages</h1>
          <small>List of All Message</small>
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
                         <h4>Message List</h4>

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

                   <div class="table-responsive">
                      <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                         <thead>
                            <tr class="info">
                               <th></th>
                               <th>Customer</th>
                               <th>Action</th>
                            </tr>
                         </thead>
                         <tbody>
                           @foreach($customermessages as $message)
                              <tr>
                                <td><i class="fa fa-envelope"></i></td>
                                <td>{{$message->customer_id}}</td>
                                <td>
                                  <a href="{{url('customermessages')}}" class="btn btn-warning btn-xs">Replay</a>
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

		</div>

    @include('backend.erp.supports.modal.replay')

  @endsection

  @section('script')
    <script type="text/javascript">

      $(document).on('click','#messagereplaybtn',function(e){
        e.preventDefault();
        $('#messagereplay').modal('show');

        var id = $(this).data('id');
        var customer_id = $(this).data('cid');
        $('#messagereplay #messageid').val(id);
        $('#messagereplay #customer_id').val(customer_id);

      });

    </script>
  @endsection
