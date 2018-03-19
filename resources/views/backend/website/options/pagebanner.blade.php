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

      						   {!! Form::open(['method'=>'post','url' => 'adminwebsiteoptionspagebanner','class'=>'col-sm-9','enctype'=>'multipart/form-data']) !!}
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

                          @if($pagebanners[0]->package_heading)
                            @php
                            $packageheading = $pagebanners[0]->package_heading;
                            @endphp
                          @else
                            @php
                            $packageheading = '';
                            @endphp
                          @endif

                          @if($pagebanners[0]->package_description)
                            @php
                            $packagedescription = $pagebanners[0]->package_description;
                            @endphp
                          @else
                            @php
                            $packagedescription = '';
                            @endphp
                          @endif

                        @endif
                        <div class="col-sm-12">
                          <div class="form-group">
                             <label>Package Page Heading</label>
                             <input type="text" name="package_heading" class="form-control" value="{{$packageheading}}">
                          </div>
                          <div class="form-group">
                             <label>Package Page Description</label>
                             <textarea name="package_description" class="form-control">{{$packagedescription}}</textarea>
                          </div>
                        </div>
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

                          @if($pagebanners[0]->hotel_heading)
                            @php
                            $hotelheading = $pagebanners[0]->hotel_heading;
                            @endphp
                          @else
                            @php
                            $hotelheading = '';
                            @endphp
                          @endif

                          @if($pagebanners[0]->hotel_description)
                            @php
                            $hoteldescription = $pagebanners[0]->hotel_description;
                            @endphp
                          @else
                            @php
                            $hoteldescription = '';
                            @endphp
                          @endif

                        @endif
                        <div class="col-sm-12">
                          <div class="form-group">
                             <label>Hotel Page Heading</label>
                             <input type="text" name="hotel_heading" class="form-control" value="{{$hotelheading}}">
                          </div>
                          <div class="form-group">
                             <label>Package Page Description</label>
                             <textarea name="hotel_description" class="form-control">{{$hoteldescription}}</textarea>
                          </div>
                        </div>
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

                          @if($pagebanners[0]->sight_heading)
                            @php
                            $sightheading = $pagebanners[0]->sight_heading;
                            @endphp
                          @else
                            @php
                            $sightheading = '';
                            @endphp
                          @endif

                          @if($pagebanners[0]->sight_description)
                            @php
                            $sightdescription = $pagebanners[0]->sight_description;
                            @endphp
                          @else
                            @php
                            $sightdescription = '';
                            @endphp
                          @endif

                        @endif
                        <div class="col-sm-12">
                          <div class="form-group">
                             <label>Sight Page Heading</label>
                             <input type="text" name="sight_heading" class="form-control" value="{{$sightheading}}">
                          </div>
                          <div class="form-group">
                             <label>Sight Page Description</label>
                             <textarea name="sight_description" class="form-control">{{$sightdescription}}</textarea>
                          </div>
                        </div>
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

                          @if($pagebanners[0]->attraction_heading)
                            @php
                            $attractionheading = $pagebanners[0]->attraction_heading;
                            @endphp
                          @else
                            @php
                            $attractionheading = '';
                            @endphp
                          @endif

                          @if($pagebanners[0]->attraction_description)
                            @php
                            $attractiondescription = $pagebanners[0]->attraction_description;
                            @endphp
                          @else
                            @php
                            $attractiondescription = '';
                            @endphp
                          @endif

                        @endif
                        <div class="col-sm-12">
                          <div class="form-group">
                             <label>Attraction Page Heading</label>
                             <input type="text" name="attraction_heading" class="form-control" value="{{$attractionheading}}">
                          </div>
                          <div class="form-group">
                             <label>Attraction Page Description</label>
                             <textarea name="attraction_description" class="form-control">{{$attractiondescription}}</textarea>
                          </div>
                        </div>
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
