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

       						<form class="form-horizontal col-sm-8" action="{{url('adminpasssettings')}}" method="POST" enctype="multipart/form-data">
       							{{csrf_field()}}

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Current Password: </label>
                      <div class="col-sm-8">
                        <input type="password" name="currentpassword" class="form-control" placeholder="Current Password" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">New Password: </label>
                      <div class="col-sm-8">
                        <input type="password" name="newpassword" class="form-control" placeholder="New Password" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Confirm New Password: </label>
                      <div class="col-sm-8">
                        <input type="password" name="newpassword_confirmation" class="form-control" placeholder="Confirm New Password" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" class="btn btn-info">Update</button>
                      </div>
                    </div>

       						</form>
       					</div>

               </div> <!-- /.row -->
            </div>
         <!-- /.content-wrapper -->

  @endsection
