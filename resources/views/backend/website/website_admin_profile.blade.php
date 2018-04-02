@extends('backend.app')

@section('title', 'Admin Website Home')

@section('body')

         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-dashboard"></i>
               </div>
               <div class="header-title">
                  <h1>Home Page</h1>
                  <small>Powerd By - Smart Web</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">

                 <div class="col-md-3">
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
                   <a href="{{url('adminpasssettings')}}" class="text-center btn btn-warning">Change Password</a>
                 </div>

                 <div class="col-md-9">

                 </div>

               </div> <!-- /.row -->
            </div>
         <!-- /.content-wrapper -->

  @endsection
