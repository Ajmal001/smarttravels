<div class="modal fade in" id="messagereplay">
  <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header modal-header-primary">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
           <h3><i class="fa fa-envelope m-r-5"></i> Replay of Message</h3>
        </div>
        <form class="" action="{{url('/customermessagesreplay')}}" method="post">
          {{csrf_field()}}
          <div class="modal-body">
             <div class="row">
                <div class="col-md-12">

                  <input type="hidden" name="message_by" value="admin">
                  <input type="hidden" name="customer_id" value="{{$customer->customer_id}}">
                  <input type="hidden" name="message_status" value="reply">

                  <div class="form-group">
                    <label class="control-label">Message</label>
                    <textarea id="summernote" name="message_details" class="form-control" rows="8"></textarea>
                  </div>

                </div>
             </div>
          </div>
          <div class="modal-footer">
             <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-add btn-sm">Send</button>
          </div>
        </form>
     </div>
     <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
