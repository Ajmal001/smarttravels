@extends('backend.app')

@section('title', 'Admin Website Pages')

@section('body')

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <div class="header-icon">
            <i class="fa fa-plane"></i>
         </div>
         <div class="header-title">
            <h1>Upload Page Banner</h1>
            <small></small>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="row">
            <!-- Form controls -->
            <div class="col-sm-12">
               <div class="panel panel-bd lobidrag">
                  <div class="panel-heading">
                     @if ($errors->any())
        								@foreach ($errors->all() as $error)
        									<span style="color:red">{{ $error }}</span>
        								@endforeach
        							@endif

        							@if(Session::has('flash_message_insert'))
        								<span style="color:green">{{ Session::get('flash_message_insert') }}</span>
        							@elseif(Session::has('flash_message_update'))
        								<span style="color:green">{{ Session::get('flash_message_update') }}</span>
        							@elseif(Session::has('flash_message_delete'))
        								<span style="color:red">{{ Session::get('flash_message_delete') }}</span>
        							@endif
                  </div>

                  <div class="panel-body">

      						   {!! Form::open(['method'=>'post','url' => 'adminwebsiteoptionspagebanner','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
                     {!! csrf_field() !!}

      							  <div class="row">
        							  <div class="col-sm-6">
          							  <div class="form-group">
                              <label>Home Page Banner</label>
                              <input type="file" name="image_home">
                          </div>
                        </div>
                        @if(isset($pagebanners) && $pagebanners)
                        @if($pagebanners[0]->image_home)
        							  <div class="col-sm-6">
          							  <div class="banner-image">
                              <img src="{{URL::to('/') }}/public/backendimages/{{$pagebanners[0]->image_home}}" alt="" class="img-responsive">
                          </div>
                        </div>
                        @endif
                        @endif
                      </div>
                      <hr>

      							  <div class="row">
        							  <div class="col-sm-6">
          							  <div class="form-group">
                              <label>Package Page Banner</label>
                              <input type="file" name="image_package">
                          </div>
                        </div>
                        @if(isset($pagebanners) && $pagebanners)
                        @if($pagebanners[0]->image_package)
        							  <div class="col-sm-6">
          							  <div class="banner-image">
                              <img src="{{URL::to('/') }}/public/backendimages/{{$pagebanners[0]->image_package}}" alt="" class="img-responsive">
                          </div>
                        </div>
                        @endif
                        @endif
                      </div>
                      <hr>

      							  <div class="row">
        							  <div class="col-sm-6">
          							  <div class="form-group">
                              <label>Hotel Page Banner</label>
                              <input type="file" name="image_hotel">
                          </div>
                        </div>
                        @if(isset($pagebanners) && $pagebanners)
                        @if($pagebanners[0]->image_hotel)
        							  <div class="col-sm-6">
          							  <div class="banner-image">
                              <img src="{{URL::to('/') }}/public/backendimages/{{$pagebanners[0]->image_hotel}}" alt="" class="img-responsive">
                          </div>
                        </div>
                        @endif
                        @endif
                      </div>
                      <hr>

      							  <div class="row">
        							  <div class="col-sm-6">
          							  <div class="form-group">
                              <label>Sight Page Banner</label>
                              <input type="file" name="image_sight">
                          </div>
                        </div>
                        @if(isset($pagebanners) && $pagebanners)
                        @if($pagebanners[0]->image_sight)
        							  <div class="col-sm-6">
          							  <div class="banner-image">
                              <img src="{{URL::to('/') }}/public/backendimages/{{$pagebanners[0]->image_sight}}" alt="" class="img-responsive">
                          </div>
                        </div>
                        @endif
                        @endif
                      </div>
                      <hr>

      							  <div class="row">
        							  <div class="col-sm-6">
          							  <div class="form-group">
                              <label>Attraction Page Banner</label>
                              <input type="file" name="image_attraction">
                          </div>
                        </div>
                        @if(isset($pagebanners) && $pagebanners)
                        @if($pagebanners[0]->image_attraction)
        							  <div class="col-sm-6">
          							  <div class="banner-image">
                              <img src="{{URL::to('/') }}/public/backendimages/{{$pagebanners[0]->image_attraction}}" alt="" class="img-responsive">
                          </div>
                        </div>
                        @endif
                        @endif
                      </div>
                      <hr>

                      <div class="form-group">
      							      <input type="submit" value="Save" class="btn btn-success" >
      							  </div>

                     {!! Form::close() !!}

      						</div>

                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- /.content -->


  @endsection
