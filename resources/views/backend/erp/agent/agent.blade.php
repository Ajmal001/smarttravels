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
                  <i class="fa fa-user-circle"></i>
               </div>
               <div class="header-title">
                  <h1>Agents</h1>
                  <small>List of All Agent</small>
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
                                 <h4>Agent List</h4>

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
            								 <a class="btn btn-add" href="#" id="addAgent" > <i class="fa fa-plus"></i> Add New Agent </a>
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
                                       <th>Area</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   @foreach($agents as $agent)
                                    <tr>
                                       <td><img src="{{ URL::to('/') }}/public/backendimages/{{$agent->agent_image}}" class="img-circle" alt="User Image" width="50" height="50"> </td>
                                       <td>{{$agent->name}}</td>
                                       <td>{{$agent->email}}</td>
                                       <td>{{$agent->agent_phone}}</td>
                                       <td>{{$agent->agent_area}}</td>
                                       <td>
                                          <a id="viewAgent" class="btn btn-add btn-sm pull-left m-r-5" href="#" data-id="{{$agent->id}}"> <i class="fa fa-eye"></i></a>
                                          <a id="editAgent" class="btn btn-warning btn-sm pull-left m-r-5" href="#" data-id="{{$agent->id}}"> <i class="fa fa-pencil"></i></a>
                                          {!! Form::open(['method'=>'post','url' => 'adminerpagentdelete/{{$agent->id}}','class'=>'pull-left','id'=>'deleteCustomer','enctype'=>'multipart/form-data']) !!}
                                          {!! csrf_field() !!}
                                          {!! method_field('DELETE') !!}
                                           <input type="hidden" name="agent_id" value="{{$agent->id}}" >
                                           <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                          {!! Form::close() !!}

                                      </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                              {{ $agents->links() }}
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

			    <!--  Add New Tour Package -->
          @include('backend.erp.agent.modal.agentadd')
          @include('backend.erp.agent.modal.agentedit')
          @include('backend.erp.agent.modal.agentview')

		</div>

  @endsection

  @section('script')
    <script type="text/javascript">
    $(document).on('click','#addAgent',function(e){
      e.preventDefault();
      $('#agentadd').modal('show');
    });

    $(document).on('click','#editAgent',function(e){
      e.preventDefault();
      $('#agentedit').modal('show');

      var id = $(this).data('id');
      $('#agentedit form').attr('action','adminerpagentupdate/'+id);

      $.get('adminerpagentedit/'+id, function(data){

        $('#agentedit #agent_name').val(data.agentdata.name);
        $('#agentedit #agent_email').val(data.agentdata.email);
        $('#agentedit #agent_phone').val(data.agentdata.agent_phone);
        $('#agentedit #agent_area').val(data.agentdata.agent_area);
        $('#agentedit #agent_image').attr('src','public/backendimages/'+data.agentdata.agent_image);

        // console.log(data.agentdata);
      })
    });

    $(document).on('click','#viewAgent',function(e){
      e.preventDefault();
      $('#agentview').modal('show');

      var id = $(this).data('id');

      $.get('adminerpagentview/'+id, function(data){

        $('#agentview #agent_name').html(data.agentdata.name);
        $('#agentview #agent_email').html(data.agentdata.email);
        $('#agentview #agent_phone').html(data.agentdata.agent_phone);
        $('#agentview #agent_area').html(data.agentdata.agent_area);
        $('#agentview #agent_image').attr('src','public/backendimages/'+data.agentdata.agent_image);

        // console.log(data.agentdata);
      })
    });
    </script>
  @endsection
