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
             <div class="mailbox">
                <div class="mailbox-header">
                   <div class="row">
                      <div class="col-xs-4">
                         <div class="inbox-avatar">
                            <i class="fa fa-user-circle fa-lg"></i>
                            <div class="inbox-avatar-text hidden-xs hidden-sm">
                               <div class="avatar-name">Alrazy</div>
                               <div><small>Messages</small></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-xs-8">
                         <div class="inbox-toolbar btn-toolbar">
                            <div class="btn-group">
                               <a href="compose.html" class="btn btn-add"><span class="fa fa-pencil-square-o"></span></a>
                            </div>
                            <div class="btn-group">
                               <a href="#" class="btn btn-default"><span class="fa fa-reply"></span></a>
                               <a href="#" class="hidden-xs hidden-sm btn btn-default"><span class="fa fa-reply-all"></span></a>
                               <a href="#" class="btn btn-default"><span class="fa fa-share"></span></a>
                            </div>
                            <div class="hidden-xs hidden-sm btn-group">
                               <button type="button" class="text-center btn btn-danger"><span class="fa fa-exclamation"></span></button>
                               <button type="button" class="btn btn-danger"><span class="fa fa-trash"></span></button>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="mailbox-body">
                   <div class="row m-0">
                      <div class="col-sm-3 p-0 inbox-nav hidden-xs hidden-sm">
                         <div class="mailbox-sideber">
                            <div class="profile-usermenu">
                               <h6>Messages box</h6>
                               <ul class="nav">
                                  <li class="active"><a href="#"><i class="fa fa-inbox"></i>Inbox <small class="label pull-right bg-green">61</small></a></li>
                                  <li><a href="#"><i class="fa fa-envelope-o"></i>Send Mail</a></li>
                                  <li><a href="#"><i class="fa fa-star-o"></i>Starred</a></li>
                                  <li><a href="#"><i class="fa fa-trash-o"></i>Tresh </a></li>
                                  <li><a href="#"><i class="fa fa-paperclip"></i>Attachments</a></li>
                               </ul>
                               <hr>
                            </div>
                         </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-9 p-0 inbox-mail">
                         <div class="mailbox-content">
                           @foreach($messages as $message)
                            <a href="mailDetails.html" class="inbox_item unread">
                               <div class="inbox-avatar">
                                 @if($message->customerdetails)
                                  <img src="public/backendimages/{{$message->customerdetails->customer_image}}" class="border-green hidden-xs hidden-sm" alt="">
                                 @else
                                  <img src="public/backendimages/customer_dafault.png" class="border-green hidden-xs hidden-sm" alt="">
                                 @endif
                                  <div class="inbox-avatar-text">
                                     <div class="avatar-name">{{$message->customer->name}} (3)</div>
                                     <div>
                                       <small>
                                         <span class="bg-green badge avatar-text">SOME LABEL</span>
                                          <span><strong>Early access: </strong>
                                         </span>
                                       </small>
                                     </div>
                                  </div>
                                  <div class="inbox-date hidden-sm hidden-xs hidden-md">
                                     <div class="date">Jan 17th</div>
                                     <div><small>#1</small></div>
                                  </div>
                               </div>
                            </a>
                            @endforeach
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
</div>
  @endsection

  @section('script')
    <script type="text/javascript">

      $(document).on('click','#messagereplaybtn',function(e){
        e.preventDefault();
      });

    </script>
  @endsection
