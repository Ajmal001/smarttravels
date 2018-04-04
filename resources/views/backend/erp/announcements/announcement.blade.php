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
  /* margin-right: 30px; */
}
</style>

     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <div class="header-icon">
              <i class="fa fa-volume-up"></i>
           </div>
           <div class="header-title">
              <h1>Announcements</h1>
              <small>List of all Announcements</small>
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
                             <h4>Task List</h4>

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
                          <a class="btn btn-add" href="#" data-toggle="modal" data-target="#addannouncement" > <i class="fa fa-plus"></i> Add New Task </a>
                        </div>
                      </div>
                       <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                       <div class="table-responsive">
                          <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                             <thead>
                                <tr class="info">
                                   <th>Title</th>
                                   <th>Date</th>
                                   <th width="50%">Description</th>
                                   <th>Action</th>
                                </tr>
                             </thead>
                             <tbody>

                              @foreach($announcements as $announcement)
                              <tr>
                                 <td>{{$announcement->announcement_title}}</td>
                                 <td>{{$announcement->announcement_execute_date}}</td>
                                 <td>{!!$announcement->announcement_description!!}</td>
                                 <td>
                                    <a class="btn btn-add btn-sm pull-left m-r-5" id="viewannouncementbutton" href="#" data-tid="{{$announcement->announcement_id}}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-warning btn-sm pull-left m-r-5" id="editannouncementbutton" href="#" data-tid="{{$announcement->announcement_id}}"><i class="fa fa-pencil"></i></a>

                                    {!! Form::open(['method'=>'post','url' => 'adminerpemployeeannouncementdelete/{{$announcement->announcement_id}}','class'=>'pull-left','enctype'=>'multipart/form-data']) !!}
                                    {!! csrf_field() !!}
                                    {{method_field('DELETE')}}
                                     <input type="hidden" name="announcement_id" value="{{$announcement->announcement_id}}" >
                                     <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                    {!! Form::close() !!}

                                 </td>
                              </tr>
                              @endforeach

                             </tbody>
                          </table>
                          {{ $announcements->links() }}
                       </div>
                    </div>
                 </div>
              </div>
           </div>


    <!--  Includeed Files -->
    @include('backend.erp.announcements.modal.announcementadd')
    @include('backend.erp.announcements.modal.announcementedit')
    @include('backend.erp.announcements.modal.announcementview')

		</div>


  @endsection

  @section('script')

  <script type="text/javascript">
    $(document).on('click','#editannouncementbutton', function(e){
      e.preventDefault();
      $('#editannouncement').modal('show');
      var cid = $(this).data('tid');
      $('#editannouncement form').attr("action", 'adminerpemployeeannouncementupdate/'+cid);
      $.get('adminerpemployeeannouncementedit/'+cid, function(data){
        $('#announcement_title').val(data.announcementdata.announcement_title);
        $('#announcement_execute_date #minMaxExample2').val(data.announcementdata.announcement_execute_date);
        $('#announcement_description #summernote').summernote('code',data.announcementdata.announcement_description);
      });
    });

    $(document).on('click','#viewannouncementbutton', function(e){
      e.preventDefault();
      $('#announcementview').modal('show');
      var cid = $(this).data('tid');
      $.get('adminerpemployeeannouncementview/'+cid, function(data){
        $('#announcementview #announcement_title').html(data.announcementdetails.announcement_title);
        $('#announcementview #announcement_execute_date').html(data.announcementdetails.announcement_execute_date);
        $('#announcementview #announcement_description').html(data.announcementdetails.announcement_description);
      });
    });
  </script>

  @endsection
