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
                  <small>Powerd By - Smart Web</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row-">

                 <div class="">

       						@if (session('error'))
                       <div class="alert alert-danger">
                           {{ session('error') }}
                       </div>
                   @endif
                   @if (session('success'))
                       <div class="alert alert-success">
                           {{ session('success') }}
                       </div>
                   @endif
       						@if ($errors->any())
       						    <div class="alert alert-danger">
       						    		@foreach ($errors->all() as $error)
       						        		{{ $error }} <br>
       						        @endforeach
       						    </div>
       						@endif

       						<form class="col s12" action="{{url('adminpasssettings')}}" method="POST" enctype="multipart/form-data">
       							{{csrf_field()}}

       							<div class="row">
       								<div class="input-field col s12 m4">
       									<label>Current Password:</label>
       								</div>
       								<div class="input-field col s12 m8">
       									<input type="password" name="currentpassword" class="validate" required>
       								</div>
       							</div>

       							<div class="row">
       								<div class="input-field col s12 m4">
       									<label>New Password:</label>
       								</div>
       								<div class="input-field col s12 m8">
       									<input type="password" name="newpassword" class="validate" required>
       								</div>
       							</div>

       							<div class="row">
       								<div class="input-field col s12 m4">
       									<label>Confirm New Password:</label>
       								</div>
       								<div class="input-field col s12 m8">
       									<input type="password" name="newpassword_confirmation" class="validate" required>
       								</div>
       							</div>

       							<div class="row">
       								<div class="input-field col s12">
       									<input type="submit" value="Update" class="waves-effect waves-light full-btn">
       								</div>
       							</div>
       						</form>
       					</div>

               </div> <!-- /.row -->
            </div>
         <!-- /.content-wrapper -->

  @endsection
