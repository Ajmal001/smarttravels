@extends('backend.app')

@section('title', 'Admin Website Home')

@section('body')

         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-gear"></i>
               </div>
               <div class="header-title">
                  <h1>Settings</h1>
                  <small></small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">

                 <div class="col-md-4">
                   <div class="cardbox_user">
                     @if($admin->image)
                     <img src="{{ URL::to('/') }}/public/backendimages/{{$admin->image}}" class="img-circle img-responsive" alt="User Image">
                     @else
                     <img src="{{ URL::to('/') }}/public/backendimages/admin_dafault.png" class="img-circle img-responsive" alt="User Image">
                     @endif
                   </div>
                   <div class="cardbox_user">
                     <h2 class="text-center">{{$admin->name}}</h2>
                     <h5 class="text-center">{{$admin->email}}</h5>
                   </div>
                   <div class="btn-group btn-group-justified" role="group">
                     <a href="{{url('adminprofsettings')}}" class="btn btn-info">Change Profile</a>
                     <a href="{{url('adminpasssettings')}}" class="btn btn-warning">Change Password</a>
                   </div>
                 </div>

                 <div class="col-md-8">

                 </div>

               </div> <!-- /.row -->
            </div>
         <!-- /.content-wrapper -->

  @endsection
