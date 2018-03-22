@extends('backend.app')

@section('title', 'Admin Website Pages')

@section('body')

<style media="screen">
  .p-lr-10{padding-left:10px;padding-right:10px;}
  .badge-warn{background-color: #f4a321;}
  .badge-dang{background-color: #d9534f;}
  .bg-lightgray{background-color: #f2f2f2;}
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
                         <div class="inbox-avatar p-20 border-btm">
                           @if($customer->customerdetails)
                            <img src="../public/backendimages/{{$customer->customerdetails->customer_image}}" class="border-green hidden-xs hidden-sm" alt="">
                           @else
                            <img src="../public/backendimages/customer_dafault.png" class="border-green hidden-xs hidden-sm" alt="">
                           @endif
                            <div class="inbox-avatar-text">
                               <div class="avatar-name"><strong>From: </strong>
                                  {{$customer->customer->name}} - <em><a href="mailto:{{$customer->customer->email}}">[{{$customer->customer->email}}]</a></em>
                               </div>
                               <div><small><strong>Subject: </strong> Regd financial projections for the next five years</small></div>
                            </div>
                            <div class="inbox-date text-right hidden-xs hidden-sm">
                               <div><span class="btn btn-add" id="messagereplaybtn"><small>Replay</small></span></div>
                            </div>
                         </div>
                         @foreach($customermessages as $messages)
                           @if($messages->message_by == 'customer')
                           <div class="inbox-mail-details p-lr-10">
                             <div class="m-t-20 border-all p-20">
                               <div>
                                 <span class="badge badge-warn">
                                   <small>{{$messages->customer->name}}</small>
                                 </span>
                                 <span class="bg-custom badge">
                                   <small>{{$messages->created_at->format('M j, Y : H:i')}}</small>
                                 </span>
                               </div>
                               {{$messages->message_details}}
                            </div>
                           </div>
                           @else
                           <div class="inbox-mail-details p-lr-10 text-right">
                             <div class="m-t-20 border-all bg-lightgray p-20">
                               <div>
                                 <span class="badge badge-dang">
                                   <small>{{$messages->message_by}}</small>
                                 </span>
                                 <span class="bg-custom badge">
                                   <small>{{$messages->created_at->format('M j, Y : H:i')}}</small>
                                 </span>
                               </div>
                               {!! $messages->message_details !!}
                            </div>
                           </div>
                           @endif
                         @endforeach
                         <div class="inbox-mail-details">
                            <div class="p-20">
                               <p class="p-b-20">Click here to <a href="#" id="messagereplaybtn">Reply</a></p>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
  </div>
  @include('backend.erp.supports.modal.replay')
  @endsection

  @section('script')
    <script type="text/javascript">
      $(document).on('click','#messagereplaybtn',function(e){
        e.preventDefault();
        $('#messagereplay').modal('show');

      });
    </script>
  @endsection
