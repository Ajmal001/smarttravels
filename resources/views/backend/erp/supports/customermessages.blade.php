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
          <i class="fa fa-comments"></i>
       </div>
       <div class="header-title">
          <h1>Messages</h1>
          <small>Full message history</small>
       </div>
    </section>
    <!-- Main content -->
    <section class="content">
       <div class="row">
          <div class="col-sm-12">
             <div class="mailbox">
                <div class="mailbox-body">
                   <div class="row m-0">
                      <div class="col-sm-5 p-0 inbox-nav hidden-xs hidden-sm">
                         <div class="mailbox-sideber">
                            <div class="profile-usermenu">
                               <h6>Messages box</h6>
                                <ul class="nav">
                                  <li>
                                  @if($customer->customerdetails)
                                   <img src="../public/backendimages/{{$customer->customerdetails->customer_image}}" style="width:250px" class="border-green hidden-xs hidden-sm" alt="">
                                  @else
                                   <img src="../public/backendimages/customer_dafault.png" style="width:250px" class="border-green hidden-xs hidden-sm" alt="">
                                  @endif
                                </li>
                                  <li><a style="font-size:15px" href="#"><i class="fa fa-user"></i>{{$customer->customer->customer_name}}  </a></li>
                                  <li><a style="font-size:15px" href="#"><i class="fa fa-envelope-o"></i>{{$customer->customer->email}}</a></li>
                                </ul>
                               <hr>
                            </div>
                         </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-7 p-0 inbox-mail">
                         <div class="inbox-avatar p-20 border-btm">
                           @if($customer->customerdetails)
                            <img src="../public/backendimages/{{$customer->customerdetails->customer_image}}"  class="border-green hidden-xs hidden-sm" alt="">
                           @else
                            <img src="../public/backendimages/customer_dafault.png"  class="border-green hidden-xs hidden-sm" alt="">
                           @endif
                            <div class="inbox-avatar-text">
                               <div class="avatar-name"><strong>From: </strong>
                                  {{$customer->customer->customer_name}} - <em><a href="mailto:{{$customer->customer->email}}">[{{$customer->customer->email}}]</a></em>
                               </div>
                            </div>
                            <div class="inbox-date text-right hidden-xs hidden-sm">
                               <div><span class="btn btn-add" id="messagereplaybtn"><small>Replay</small></span></div>
                            </div>
                         </div>

                         <!-- Ajax Message Load -->
                         <div id="messages-ajax"></div>
                         <!-- End Ajax Message Load  -->

                         <div class="inbox-mail-details">
                            <div class="p-20">
                               <a><p class="btn btn-success" id="messagereplaybtn"> Click here to Reply</p></a>
                            </div>
                         </div>
                      </div> <!-- /.inbox-mail -->
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

      // Ajax Load
      function messageLoad() {
        var url = window.location.pathname;
        var id = url.substring(url.lastIndexOf('/') + 1);
        $.get("{{url('customermessages-json')}}/"+id, function(data){
          $('#messages-ajax').empty().html(data);
        });
      }
      $(document).one('ready',function(){
          messageLoad();
      });
      setInterval(messageLoad, 5000);

    </script>

    <script type="text/javascript">
    $(function () {
           $("html, body").animate({
            scrollTop: $('html, body').get(0).scrollHeight+1000000000}, 1000);});
    </script>
  @endsection
