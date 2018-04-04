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
                  <i class="fa fa-pagelines "></i>
               </div>
               <div class="header-title">
                  <h1>Sight Seeing</h1>
                  <small>List of all Sights</small>
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
                                 <h4>Sight List</h4>

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
                           <div class="btn-group">
                                <div class="buttonexport" id="buttonlist">
								<a class="btn btn-add" href="#" data-toggle="modal" data-target="#package" > <i class="fa fa-plus"></i> Add New Sight </a>
								<a class="btn btn-add" href="#" data-toggle="modal" data-target="#country" > <i class="fa fa-plus"></i> Add Country </a>
								<a class="btn btn-add" href="#" data-toggle="modal" data-target="#location" > <i class="fa fa-plus"></i> Add Location </a>
						   </div>

                           </div>
                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Sight Image</th>
                                       <th>Package Name</th>
                                       <th>Country</th>
                                       <th>Location</th>
                                       <th width="122px">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
									@foreach($sightList as $sl)
                                    <tr>
                                       <td><img src="{{ URL::to('/') }}/public/backendimages/{{$sl->image}}" class="img-circle" alt="User Image" width="50" height="50"></td>
                                       <td>{{$sl->name}}</td>
                                       <td>{{$sl->country}}</td>
                                       <td>{{$sl->location}}</td>
                                       <td>
										    <a id="viewsigntslmodalbtn" class="btn btn-add btn-sm" href="#" data-id="{{$sl->sight_id}}"><i class="fa fa-eye "></i></a>
										    <a id="editsigntslmodalbtn" class="btn btn-warning btn-sm" href="#" data-id="{{$sl->sight_id}}"><i class="fa fa-pencil"></i></a>
                                           	{!! Form::open(['method'=>'post','url'=>'adminwebsitedeletesights/{{$sl->sight_id}}','class'=>'pull-right delete-btn','enctype'=>'multipart/form-data']) !!}
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}
                                                <input type="hidden" name="sight_id" value="{{$sl->sight_id}}" >
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                            {!! Form::close() !!}
									   </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                              {{$sightList->links()}}
                           </div>
                        </div>
                     </div>
                  </div>
               </div>




			    <!--  Add New Tour Package -->
                <div class="modal fade" id="package" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-pagelines  m-r-5"></i> Add New Sight </h3>
                        </div>

						<div class="modal-body">
                           <div class="row">
                               <div class="panel-body">

							{!! Form::open(['method'=>'post','url' => 'adminwebsiteinsertsight','class'=>'col-sm-12','enctype'=>'multipart/form-data']) !!}
                               {!! csrf_field() !!}
                              <div class="form-group">
                                 <label>Sight Name</label>
                                 <input type="text" name="name" class="form-control" placeholder="Enter Tour Package Name" required>
                              </div>
							  <div class="form-group">
                                 <label>Sight SKU</label>
                                 <input type="text" name="sku" class="form-control" placeholder="Enter Tour Package SKU" required>
                              </div>
							  <div class="form-group">
                                 <label>Country</label>
								 <select class="js-example-basic-multiple" name="country[]" id="addSightLocationByChangingCountry" style="width:95%;"  multiple="multiple">
									@foreach($countryList as $cl)
									<option>{{$cl->country_name}}</option>
									@endforeach
								 </select>
                              </div>

                               <div class="form-group">
                                 <label>Locations</label>
                                 <select class="js-example-basic-multiple" name="location[]" id="addSightLocationByMultipleCountry" style="width:95%;"  multiple="multiple">
									@foreach($locationList as $ll)
									<option>{{$ll->location_name}}</option>
									@endforeach
								 </select>
                              </div>

                              <div class="form-group">
                                 <label>Sight Image</label>
                                 <input type="file" name="image" required>
                              </div>
                              <div class="form-group">
                                 <label>Sight details</label>
                               <textarea class="form-control" id="summernote" name="details" rows="3"></textarea>

                              </div>
                              <div class="form-group">
							  <input type="submit" value="Save" class="btn btn-success" >
							   </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                  </div>
                  <!-- /.modal-dialog -->
               </div>
			 </div>
            </div>



			<!--  Add Country -->
                <div class="modal fade" id="country" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-globe m-r-5"></i> Add Country </h3>
                        </div>

						<div class="modal-body">
                           <div class="row">
                               <div class="panel-body">

							{!! Form::open(['method'=>'post','url' => 'adminwebsiteinserthotelcountry','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
                               {!! csrf_field() !!}
                              <div class="form-group">
                                 <label>Country Name</label>
                                 <input type="text" name="country_name" class="form-control" placeholder="Enter Country Name" required>
                              </div>

                              <div class="form-group">
							  <input type="submit" value="Save" class="btn btn-success" >
							   </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                  </div>
                  <!-- /.modal-dialog -->
               </div>
			 </div>
            </div>



			 <!--  Add New Location -->
                <div class="modal fade" id="location" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-pagelines  m-r-5"></i> Add Location </h3>
                        </div>

						<div class="modal-body">
                           <div class="row">
                               <div class="panel-body">

							{!! Form::open(['method'=>'post','url' => 'adminwebsiteinserthotellocation','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
                               {!! csrf_field() !!}
                              <div class="form-group">
                                 <label>Country</label>
                                 <select class="form-control" name="country_id">
									<option>-Select Country-</option>
									@foreach($countryList as $cl)
									<option value="{{$cl->country_id}}">{{$cl->country_name}}</option>
									@endforeach
								  </select>
                              </div>

							  <div class="form-group">
                                 <label>Location Name</label>
                                 <input type="text" name="location_name" class="form-control" placeholder="Enter Location Name" required>
                              </div>

                              <div class="form-group">
							  <input type="submit" value="Save" class="btn btn-success" >
							   </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                  </div>
                  <!-- /.modal-dialog -->
               </div>
			 </div>
            </div>



            <!--  VIEW MODAL START -->
            <div class="modal fade" id="viewsightsmodal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3><i class="fa fa-pagelines  m-r-5"></i> View Sight Seeing </h3>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="panel-body">

                                <table class="table table-bordered">
                                        <thead>
                                            <th width="20%">Name</th>
                                            <th>Value</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Sight Name</strong></td>
                                                <td id="sight_name"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Sight SKU</strong></td>
                                                <td id="sight_sku"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Country</strong></td>
                                                <td id="sight_country"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Locations</strong></td>
                                                <td id="sight_location"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Hotel Image</strong></td>
                                                <td>
                                                    <img src="" id="sight_image" width="100%">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Hotel details</strong></td>
                                                <td id="sight_details"></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- VIEW MODAL END -->


			<!-- EDIT MODAL START -->
            <div class="modal fade" id="editsigntsmodal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3><i class="fa fa-pagelines  m-r-5"></i> Edit Sights Seeing </h3>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="panel-body">

                                    {!! Form::open(['method'=>'post','url'=>'adminwebsiteeditsightsave','class'=>'col-sm-12','enctype'=>'multipart/form-data']) !!}
                                    {!! csrf_field() !!}

                                    <input type="hidden" name="sight_id" id="sight_id" value="" >

                                    <div class="form-group">
                                        <label>Sight Name</label>
                                        <input type="text" name="name" class="form-control" id="sight_name" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Sight SKU</label>
                                        <input type="text" name="sku" class="form-control" id="sight_sku" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Country</label>
                                        <select class="js-example-basic-multiple" name="country[]" id="country" style="width:95%;"  multiple="multiple" required>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Locations</label>
                                        <select class="js-example-basic-multiple" name="location[]" id="location" style="width:95%;"  multiple="multiple" required>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Sight Image</label>
                                        <input type="file" name="image">
                                        <img src="" id="sight_image" width="240" style="display:none;">
                                    </div>

                                    <div class="form-group">
                                        <label>Sight details</label>
                                        <textarea class="form-control" id="summernote-editsights" name="details" rows="3"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" value="Save" class="btn btn-success" >
                                    </div>

                                    {!! Form::close() !!}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  EDIT MODAL END -->


		</div>


@endsection


@section('script')

<script>

    // MULTIPLE DROPDOWN SELECT
    $("#addSightLocationByChangingCountry").on('change', function(){
        var countryNameArr = $(this).val();
        if(countryNameArr != null){
            var countryNameStr = countryNameArr.toString();
            $('#addSightLocationByMultipleCountry').empty();
            $.get('travelcountrylocationname-json?countryname='+countryNameStr, function(data){
                $.each(data, function(index, valuearr){
                    $.each(valuearr, function(index, value){
                        $('#addSightLocationByMultipleCountry').append('<option>'+value+'</option>');
                    });
                });
            });
        }
    });


    // EDIT SIGHT SEEING
    $(document).on('click', '#editsigntslmodalbtn', function(e){
        e.preventDefault();
        $('#editsigntsmodal').modal('show');

        var id = $(this).data('id');

        $.get('adminwebsiteeditsights/'+id, function(data){

            $('#editsigntsmodal #sight_id').val(data.editsight.sight_id);
            $('#editsigntsmodal #sight_name').val(data.editsight.name);
            $('#editsigntsmodal #sight_sku').val(data.editsight.sku);

            var country_str = data.editsight.country;
            var country = country_str.split(',');
            $('#editsigntsmodal #country').empty();
            $.each(country, function(index, value){
                $('#editsigntsmodal #country').append('<option selected="selected">'+value+'</option>');
            });
            var country_not_in = data.countryName.filter(function(obj) { return country.indexOf(obj) == -1; });
            $.each(country_not_in, function(index, value){
                $('#editsigntsmodal #country').append('<option>'+value+'</option>');
            });

            var location_str = data.editsight.location;
            var location = location_str.split(',');
            $('#editsigntsmodal #location').empty();
            $.each(location, function(index, value){
                $('#editsigntsmodal #location').append('<option selected="selected">'+value+'</option>');
            });
            $("#editsigntsmodal #country").on('change', function(){
                var countryNameArr = $(this).val();
                if(countryNameArr != null){
                    var countryNameStr = countryNameArr.toString();
                    $('#editsigntsmodal #location').empty();
                    $.get('travelcountrylocationname-json?countryname='+countryNameStr, function(data){
                        $.each(data, function(index, valuearr){
                            $.each(valuearr, function(index, value){
                                $('#editsigntsmodal #location').append('<option>'+value+'</option>');
                            });
                        });
                    });
                }
            });

            $('#editsigntsmodal #sight_image').attr('src','public/backendimages/'+data.editsight.image);
            $('#editsigntsmodal #sight_image').attr("style","display:block;margin-top:10px;");

            $('#summernote-editsights').summernote('code', data.editsight.details);

            //console.log(data.editsight);
        });
    });

    // VIEW SIGHT SEEING
    $(document).on('click', '#viewsigntslmodalbtn', function(e){
        e.preventDefault();
        $('#viewsightsmodal').modal('show');
        var id = $(this).data('id');
        $.get('adminwebsiteviewsights/'+id, function(data){
            $('#viewsightsmodal #sight_name').html(data.viewsight.name);
            $('#viewsightsmodal #sight_sku').html(data.viewsight.sku);
            $('#viewsightsmodal #sight_country').html(data.viewsight.country);
            $('#viewsightsmodal #sight_location').html(data.viewsight.location);
            $('#viewsightsmodal #sight_details').html(data.viewsight.details);
            $('#viewsightsmodal #sight_image').attr('src','public/backendimages/'+data.viewsight.image);
        });
    });

</script>

@endsection
