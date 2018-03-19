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
              <h1>Expenses</h1>
              <small>List of all Expenses</small>
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
                             <h4>Expense List</h4>

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
                          <a class="btn btn-add" href="#" data-toggle="modal" data-target="#package" > <i class="fa fa-plus"></i> Add New Expense </a>
                        </div>
                      </div>
                       <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                       <div class="table-responsive">
                          <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                             <thead>
                                <tr class="info">
                                   <th>Expense Title</th>
                                   <th>Expense Type</th>
                                   <th>Date</th>
                                   <th>Amount</th>
                                   <th>Action</th>
                                </tr>
                             </thead>
                             <tbody>
                              @foreach($expenses as $expense)
                              <tr>
                                 <td>{{$expense->expense_title}}</td>
                                 <td>{{$expense->expense_type}}</td>
                                 <td>{{$expense->expense_date}}</td>
                                 <td>{{$expense->expense_amount}}</td>

                                 <td>
                                    <a id="expenseeditbutton" class="btn btn-warning btn-sm pull-right" href="/" data-eid="{{$expense->expense_id}}"><i class="fa fa-pencil"></i></a>
                                    {!! Form::open(['method'=>'post','url' => 'adminerpexpensesdelete/{{$expense->expense_id}}','class'=>'col-sm-6 pull-right delete-btn','id'=>'deleteCustomer','enctype'=>'multipart/form-data']) !!}
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                     <input type="hidden" name="expense_id" value="{{$expense->expense_id}}" >
                                     <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    {!! Form::close() !!}
                                 </td>
                              </tr>
                              @endforeach
                             </tbody>
                          </table>
                          {{ $expenses->links() }}
                       </div>
                    </div>
                 </div>
              </div>
           </div>

           <!--  Includeed Files -->
           @include('backend.erp.accounts.expenses.modal.expenseadd')
           @include('backend.erp.accounts.expenses.modal.expenseedit')

		</div>


  @endsection

  @section('script')

  <script type="text/javascript">
    $(document).on('click','#expenseeditbutton', function(e){
        e.preventDefault();
        $('#expenseEdit').modal('show');
        var eid = $(this).data('eid');
        $('#expenseEdit form').attr("action", 'adminerpexpensesupdate/'+eid);
        $.get('adminerpexpensesedit/'+eid, function(data){
          $('#expense_type').find("option[value='" + data.expensedata.expense_type + "']").attr('selected', true);
          $('#expense_title').val(data.expensedata.expense_title);
          $('#expense_amount').val(data.expensedata.expense_amount);
          $('#expense_date #minMaxExample2').val(data.expensedata.expense_date);
        });

     });

  </script>

  @endsection
