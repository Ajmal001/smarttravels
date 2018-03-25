@extends('backend.app')

@section('title', 'Admin Website Pages')

@section('body')

<style media="screen">
  .unread{background-color: #08436840;}
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

                             @foreach($messagedetails as $msgstatus)
                               @if($msgstatus->message_status == "unseen")
                                 <a href="{{url('customermessages',[$message->customer_id])}}" class="inbox_item unread">
                               @else
                                 <a href="{{url('customermessages',[$message->customer_id])}}" class="inbox_item">
                               @endif
                             @endforeach

                              <div class="inbox-avatar">
                                 @if($message->customerdetails)
                                  <img src="public/backendimages/{{$message->customerdetails->customer_image}}" class="border-green hidden-xs hidden-sm" alt="">
                                 @else
                                  <img src="public/backendimages/customer_dafault.png" class="border-green hidden-xs hidden-sm" alt="">
                                 @endif
                                  <div class="inbox-avatar-text">
                                     <div class="avatar-name">{{$message->customer->customer_name}} </div>
                                     <div>
                                       <small>
                                         @foreach($messagedetails as $msgdate)
                                           @if($msgdate->customer_id == $message->customer_id)
                                           <span class="bg-green badge avatar-text">{{$msgdate->created_at->format('M j, Y')}}</span>
                                           @endif
                                         @endforeach
                                         @foreach($messagedetails as $details)
                                            @if($details->customer_id == $message->customer_id)

                                              @if (strlen(strip_tags($details->message_details)) > 80)
                                              <span><strong>{!! str_limit(strip_tags($details->message_details), 80) !!} </strong>
                                              @else
                                              <span><strong> {!! $details->message_details !!}</strong>
                                              @endif

                                            @endif
                                          @endforeach
                                         </span>
                                       </small>
                                     </div>
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

    </script>
  @endsection
