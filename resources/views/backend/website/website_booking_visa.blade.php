@extends('backend.app')

@section('title', 'Admin Website Pages')

@section('body')

<style>
.select2-container--default .select2-results__option[aria-selected="true"] {
    background-color: #009688;
	color:white;
}
</style>

         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-address-card"></i>
               </div>
               <div class="header-title">
                  <h1>Visa Applications</h1>
                  <small>List of all Visa Applications</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>Visa Applications</h4>

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
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->



                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>First Name</th>
                                       <th>Last Name</th>
                                       <th>Email</th>
                                       <th>Mobile</th>
                                       <th>Country</th>
                                       <th>Address</th>
                                       <th>Profession</th>
                                       <th>Passport No</th>
                                       <th>Date</th>
                                       <th>User Image</th>
                                       <th>Password Image</th>
                                       <th>Delete</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								    @foreach($visaBooingList as $visa)
                                    <tr>
                                       <td>{{$visa->first_name}}</td>
                                       <td>{{$visa->last_name}}</td>
                                       <td>{{$visa->email}}</td>
                                       <td>{{$visa->mobile}}</td>
                                       <td>{{$visa->country}}</td>
                                       <td>{{$visa->address}}</td>
                                       <td>{{$visa->profession}}</td>
                                       <td>{{$visa->passport_no}}</td>
                                       <td>{{$visa->arrival_date}}</td>

                                       <td><a href="{{ URL::to('/') }}/public/backendimages/{{$visa->image_user}}" download>Download</a></td>
                                       <td><a href="{{ URL::to('/') }}/public/backendimages/{{$visa->image_passport}}" download>Download</a></td>

                                       <td>
										    <a class="btn btn-danger btn-sm" href="adminwebsitevisabookingdelete/{{$visa->id}}"><i class="fa fa-trash-o"></i></a>
                                       </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                              {{$visaBooingList->links()}}
                           </div>
                        </div>
                     </div>
                  </div>
               </div>









		</div>


  @endsection
