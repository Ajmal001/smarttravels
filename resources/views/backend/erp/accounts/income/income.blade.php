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
              <i class="fa fa-calculator"></i>
           </div>
           <div class="header-title">
              <h1>Income</h1>
              <small>List of all Income</small>
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
                             <h4>Income List</h4>

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
                          <a class="btn btn-add" href="{{url('/adminerpsales')}}"> <i class="fa fa-plus"></i> Income & Sales</a>
                        </div>
                      </div>
                       <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                       <div class="table-responsive">
                          <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                             <thead>
                                <tr class="info">
                                   <th>Income Title</th>
                                   <th>Income Type</th>
                                   <th>Date</th>
                                   <th>Amount</th>
                                </tr>
                             </thead>
                             <tbody>
                              @foreach($allincome as $income)
                              <tr>
                                 <td>{{$income->sales_item_name}}</td>
                                 <td>{{$income->sales_item_type}}</td>
                                 <td>{{$income->sales_date}}</td>
                                 <td>
                                   {{$income->sales_price}}
                                   @if($optionscurrency)
                     								{{$optionscurrency->currency}}
                     							@endif
                                 </td>
                              </tr>
                              @endforeach
                             </tbody>
                          </table>
                          {{ $allincome->links() }}
                       </div>
                    </div>
                 </div>
              </div>
           </div>

           <!--  Includeed Files -->
           {{--@include('backend.erp.accounts.expenses.modal.expenseadd')
           @include('backend.erp.accounts.expenses.modal.expenseedit') --}}

           @include('backend.erp.sales.modal.salesadd')
           @include('backend.erp.sales.modal.salesedit')
           @include('backend.erp.sales.modal.salesview')

		</div>


  @endsection

  @section('script')

  <script type="text/javascript">

  $(document).on('click','#salesEdit', function(e){
    e.preventDefault();
    $('#salesedit').modal('show');
    var cid = $(this).data('id');
    $('#salesedit form').attr("action", 'adminerpsalesupdate/'+cid);
    $.get('adminerpsalesedit/'+cid, function(data){
      $('#salesedit #sales_item_type').val(data.salesdata.sales_item_type);
      $('#salesedit #sales_item_name').val(data.salesdata.sales_item_name);
      $('#salesedit #sales_sku').val(data.salesdata.sales_sku);
      $('#salesedit #sales_price').val(data.salesdata.sales_price);
      $('#salesedit #sales_date #minMaxExample2').val(data.salesdata.sales_date);
      $('#salesedit #sales_customer_id').find("option[value='" + data.salesdata.sales_customer_id + "']").attr('selected', true);
      $('#salesedit #sales_by_type').val(data.salesdata.sales_by_type);
      $('#salesedit #sales_by_id').val(data.salesdata.sales_by_id);
      $('#salesedit #sales_customer_rating').val(data.salesdata.sales_customer_rating);

      // console.log(data.salesdata.sales_by_id);
    });

  });

  $(document).on('click','#salesView', function(e){
    e.preventDefault();
    $('#salesview').modal('show');
    var cid = $(this).data('sid');
    $.get('adminerpsalesview/'+cid, function(data){
      $('#salesview #sales_item_type').html(data.salesdetails.sales_item_type);
      $('#salesview #sales_item_name').html(data.salesdetails.sales_item_name);
      $('#salesview #sales_sku').html(data.salesdetails.sales_sku);
      $('#salesview #sales_price').html(data.salesdetails.sales_price);
      $('#salesview #sales_date').html(data.salesdetails.sales_date);
      $('#salesview #sales_customer_id').html(data.salesdetails.sales_customer_id);
      $('#salesview #sales_by_type').html(data.salesdetails.sales_by_type);
      $('#salesview #sales_by_id').html(data.salesdetails.sales_by_id);
      $('#salesview #sales_customer_rating').html(data.salesdetails.sales_customer_rating);

      // console.log(data.salesdetails);
    });
  });

  </script>

  @endsection
