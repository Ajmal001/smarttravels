<!--  Add New Announcement -->
<div class="modal fade" id="addannouncement" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header modal-header-primary">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
           <h3><i class="fa fa-volume-up m-r-5"></i> Add New Announcement </h3>
        </div>

        <div class="modal-body">
           <div class="row">
             <div class="panel-body">

               {!! Form::open(['method'=>'post','url' => 'adminerpemployeeannouncementadd','class'=>'col-sm-12','enctype'=>'multipart/form-data']) !!}
               {!! csrf_field() !!}
              <div class="form-group">
                 <label>Announcement Title</label>
                 <input type="text" name="announcement_title" class="form-control" placeholder="Enter Announcement Title" required>
              </div>

              <div class="form-group">
                 <label>Announcement Date</label>
                 <div class="input-group date form_date" >
                    <input id='minMaxExample' type="text" name="announcement_execute_date" style="z-index: 1050 !important;" class="form-control years"><span class="input-group-addon"><a href="#"><i class="fa fa-calendar"></i></a></span>
                 </div>
              </div>

              <div class="form-group">
                 <label>Announcement details</label>
                 <textarea class="form-control" id="summernote" name="announcement_description" rows="3"></textarea>
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
