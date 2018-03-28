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
                  <i class="fa fa-home"></i>
               </div>
               <div class="header-title">
                  <h1>Hotels</h1>
                  <small>List of all Hotels</small>
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
                                 <h4>Hotels List</h4>

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
								<a class="btn btn-add" href="#" data-toggle="modal" data-target="#package" > <i class="fa fa-plus"></i> Add New Hotel </a>
								<a class="btn btn-add" href="#" data-toggle="modal" data-target="#country" > <i class="fa fa-plus"></i> Add Country </a>
								<a class="btn btn-add" href="#" data-toggle="modal" data-target="#location" > <i class="fa fa-plus"></i> Add Location </a>
								<a class="btn btn-add" href="#" data-toggle="modal" data-target="#features" > <i class="fa fa-plus"></i> Add Features </a>
						   </div>

                           </div>
                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Hotel Image</th>
                                       <th>Hotel Name</th>
                                       <th>SKU</th>
                                       <th>Country</th>
                                       <th>Rating</th>
                                       <th>Price</th>
                                       <th width="122px">action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								    @foreach($hotelList as $hl)
                                    <tr>
                                       <td><img src="{{ URL::to('/') }}/public/backendimages/{{$hl->hotel_image}}" class="img-circle" alt="User Image" width="50" height="50"> </td>
                                       <td>{{$hl->hotel_name}}</td>
                                       <td>{{$hl->hotel_sku}}</td>
                                       <td>{{$hl->hotel_country}}</td>
                                       <td>{{$hl->hotel_rating}}</td>
                                       <td>
                                         {{$hl->hotel_price}}
                                         @if($optionscurrency)
                           								{{$optionscurrency->currency}}
                           							 @endif
                                       </td>
                                       <td>
										    <a id="viewhotelmodalbtn" class="btn btn-add btn-sm" href="#" data-id="{{$hl->hotel_id}}"><i class="fa fa-eye"></i></a>
										    <a id="edithotelmodalbtn" class="btn btn-warning btn-sm" href="#" data-id="{{$hl->hotel_id}}"><i class="fa fa-pencil"></i></a>
                                            {!! Form::open(['method'=>'post','url'=>'adminwebsitedeletehotel/{{$hl->hotel_id}}','class'=>'pull-right delete-btn','enctype'=>'multipart/form-data']) !!}
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}
                                                <input type="hidden" name="hotel_id" value="{{$hl->hotel_id}}" >
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                            {!! Form::close() !!}
									   </td>
                                    </tr>
									@endforeach
                                 </tbody>
                              </table>
                              {{$hotelList->links()}}
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
                           <h3><i class="fa fa-home m-r-5"></i> Add New Hotel </h3>
                        </div>

						<div class="modal-body">
                           <div class="row">
                               <div class="panel-body">

							{!! Form::open(['method'=>'post','url' => 'adminwebsiteinserthotel','class'=>'col-sm-6-','enctype'=>'multipart/form-data']) !!}
                               {!! csrf_field() !!}
                              <div class="form-group">
                                 <label>Hotel Name</label>
                                 <input type="text" name="hotel_name" class="form-control" placeholder="Enter Hotel Name" required>
                              </div>
							  <div class="form-group">
                                 <label>Hotel SKU</label>
                                 <input type="text" name="hotel_sku" class="form-control" placeholder="Enter Hotel SKU" required>
                              </div>

							  <div class="form-group">
                                <label>Country</label>
								 <select class="js-example-basic-multiple" name="hotel_country[]" id="addHotelLocationByChangingCountry" style="width:95%;"  multiple="multiple" required>
									@foreach($countryList as $cl)
									<option>{{$cl->country_name}}</option>
									@endforeach
								 </select>
                              </div>

                               <div class="form-group">
                                 <label>Locations</label>
                                 <select class="js-example-basic-multiple" name="hotel_location[]" id="addHotelLocationByMultipleCountry" style="width:95%;"  multiple="multiple" required>

								 </select>
                              </div>

                              <div class="form-group">
                                 <label>Address</label>
                                 <textarea class="form-control"  name="hotel_address" rows="3"></textarea>
                              </div>

							  <div class="form-group">
                                 <label>Price</label>
                                 <input type="text" name="hotel_price" class="form-control" placeholder="Enter Price" required>
                              </div>

							    <div class="form-group">
                                    <label>Rating</label>
                                    <div id="addhotelrating"></div>
                                    <input type="hidden" name="hotel_rating" id="hotel_rating">
							  </div>

							  <div class="form-group">
                                 <label>Hotel Features</label>
								 <select class="js-example-basic-multiple" name="hotel_features[]" style="width:95%;"  multiple="multiple">
									@foreach($hotelFeatureList as $hfl)
									<option>{{$hfl->features_name}}</option>
									@endforeach
								 </select>
                              </div>

                              <div class="form-group">
                                 <label>Hotel Image</label>
                                 <input type="file" name="hotel_image" required>
                              </div>
                              <div class="form-group">
                                 <label>Hotel details</label>
                               <textarea class="form-control" id="summernote" name="hotel_details" rows="3"></textarea>

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
                           <h3><i class="fa fa-plane m-r-5"></i> Add Location </h3>
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


			<!--  Add New Features -->
                <div class="modal fade" id="features" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-plane m-r-5"></i> Add Hotel Features </h3>
                        </div>

						<div class="modal-body">
                           <div class="row">
                               <div class="panel-body">

							{!! Form::open(['method'=>'post','url' => 'adminwebsiteinserthotelfeature','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
                               {!! csrf_field() !!}


							  <div class="form-group">
                                 <label>Hotel Features Name</label>
                                 <input type="text" name="features_name" class="form-control" placeholder="Enter Features Name" required>
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
            <div class="modal fade" id="viewhotelmodal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3><i class="fa fa-plane m-r-5"></i> View Hotel </h3>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="panel-body">

                                <table class="table table-bordered">
                                        <thead>
                                            <th width="30%">Name</th>
                                            <th>Value</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Hotel Name</strong></td>
                                                <td id="hotel_name"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Hotel SKU</strong></td>
                                                <td id="hotel_sku"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Country</strong></td>
                                                <td id="hotel_country"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Locations</strong></td>
                                                <td id="hotel_location"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Address</strong></td>
                                                <td id="hotel_address"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Price</strong></td>
                                                <td id="hotel_price"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Rating</strong></td>
                                                <td>
                                                    <div id="viewhotelrating"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Hotel Features</strong></td>
                                                <td id="hotel_features"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Hotel details</strong></td>
                                                <td id="hotel_details"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Hotel Image</strong></td>
                                                <td>
                                                    <img src="" id="hotel_image" width="100%">
                                                </td>
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

            <!--  EDIT MODAL START -->
            <div class="modal fade" id="edithotelmodal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3><i class="fa fa-plane m-r-5"></i> Edit Hotel </h3>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="panel-body">

                                {!! Form::open(['method'=>'post','url' => 'adminwebsiteedithotel','class'=>'col-sm-6-','enctype'=>'multipart/form-data']) !!}
                                {!! csrf_field() !!}
                                    <input type="hidden" name="hotel_id" id="hotel_id" value="" >
                                    <div class="form-group">
                                        <label>Hotel Name</label>
                                        <input type="text" name="hotel_name" class="form-control" id="hotel_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Hotel SKU</label>
                                        <input type="text" name="hotel_sku" class="form-control" id="hotel_sku" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Country</label>
                                        <select class="js-example-basic-multiple" name="hotel_country[]" id="hotel_country" style="width:95%;"  multiple="multiple" required>
                                            @foreach($countryList as $cl)
                                            <option>{{$cl->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Locations</label>
                                        <select class="js-example-basic-multiple" name="hotel_location[]" id="hotel_location" style="width:95%;"  multiple="multiple" required>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control"  name="hotel_address" id="hotel_address" rows="3"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" name="hotel_price" class="form-control" id="hotel_price" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Rating</label>
                                        <div id="edithotelrating"></div>
                                        <input type="hidden" name="hotel_rating" id="hotel_ratingedit">
                                    </div>

                                    <div class="form-group">
                                        <label>Hotel Features</label>
                                        <select class="js-example-basic-multiple" name="hotel_features[]" id="hotel_features" style="width:95%;"  multiple="multiple">
                                            @foreach($hotelFeatureList as $hfl)
                                            <option>{{$hfl->features_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Hotel Image</label>
                                        <input type="file" name="hotel_image">
                                        <img src="" id="hotel_image" width="240" style="display:none;">
                                    </div>

                                    <div class="form-group">
                                        <label>Hotel details</label>
                                        <textarea class="form-control" id="summernote-edithotel" name="hotel_details" rows="3"></textarea>
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
            <!-- EDIT MODAL END -->


		</div> <!-- /.content-wrapper -->

  @endsection

  @section('script')

    <script>

        // MULTIPLE DROPDOWN SELECT
        $("#addHotelLocationByChangingCountry").on('change', function(){
            var countryNameArr = $(this).val();
            if(countryNameArr != null){
                var countryNameStr = countryNameArr.toString();
                $('#addHotelLocationByMultipleCountry').empty();
                $.get('travelcountrylocationname-json?countryname='+countryNameStr, function(data){
                    $.each(data, function(index, valuearr){
                        $.each(valuearr, function(index, value){
                            $('#addHotelLocationByMultipleCountry').append('<option>'+value+'</option>');
                        });
                    });
                });
            }
        });

        // ADD RATING JQUERY PLUGIN
        $(function () {
            $("#addhotelrating").rateYo().on("rateyo.set", function (e, data) {
            $("#hotel_rating").val(data.rating);
            });
        });


        // EDIT HOTEL
        $(document).on('click', '#edithotelmodalbtn', function(e){
            e.preventDefault();
            $('#edithotelmodal').modal('show');

            var id = $(this).data('id');

            $.get('adminwebsiteshowedithotel/'+id, function(data){
                $('#edithotelmodal #hotel_id').val(data.edithotel.hotel_id);
                $('#edithotelmodal #hotel_name').val(data.edithotel.hotel_name);
                $('#edithotelmodal #hotel_sku').val(data.edithotel.hotel_sku);
                $('#edithotelmodal #hotel_address').val(data.edithotel.hotel_address);
                $('#edithotelmodal #hotel_price').val(data.edithotel.hotel_price);

                var country_str = data.edithotel.hotel_country;
                var hotel_country = country_str.split(',');
                $('#edithotelmodal #hotel_country').empty();
                $.each(hotel_country, function(index, value){
                    $('#edithotelmodal #hotel_country').append('<option selected="selected">'+value+'</option>');
                });
                var country_not_in = data.countryName.filter(function(obj) { return hotel_country.indexOf(obj) == -1; });
                $.each(country_not_in, function(index, value){
                    $('#edithotelmodal #hotel_country').append('<option>'+value+'</option>');
                });

                var location_str = data.edithotel.hotel_location;
                var hotel_location = location_str.split(',');
                $('#edithotelmodal #hotel_location').empty();
                $.each(hotel_location, function(index, value){
                    $('#edithotelmodal #hotel_location').append('<option selected="selected">'+value+'</option>');
                });
                $("#edithotelmodal #hotel_country").on('change', function(){
                    var countryNameArr = $(this).val();
                    if(countryNameArr != null){
                        var countryNameStr = countryNameArr.toString();
                        $('#edithotelmodal #hotel_location').empty();
                        $.get('travelcountrylocationname-json?countryname='+countryNameStr, function(data){
                            $.each(data, function(index, valuearr){
                                $.each(valuearr, function(index, value){
                                    $('#edithotelmodal #hotel_location').append('<option>'+value+'</option>');
                                });
                            });
                        });
                    }
                });

                $('#edithotelmodal #hotel_ratingedit').val(data.edithotel.hotel_rating);
                var $edithotelrating = $("#edithotelrating").rateYo();
                $edithotelrating.rateYo("rating", data.edithotel.hotel_rating);
                $("#edithotelrating").rateYo().on("rateyo.set", function (e, data) {
                    $("#hotel_ratingedit").val(data.rating);
                });

                var hotel_features_str = data.edithotel.hotel_features;
                var hotel_features = hotel_features_str.split(',');
                $('#edithotelmodal #hotel_features').empty();
                $.each(hotel_features, function(index, value){
                    $('#edithotelmodal #hotel_features').append('<option selected="selected">'+value+'</option>');
                });
                var hotelfeatures_not_in = data.hotelFeaturedList.filter(function(obj) { return hotel_features.indexOf(obj) == -1; });
                $.each(hotelfeatures_not_in, function(index, value){
                    $('#edithotelmodal #hotel_features').append('<option>'+value+'</option>');
                });

                $('#edithotelmodal #hotel_image').attr('src','public/backendimages/'+data.edithotel.hotel_image);
                $('#edithotelmodal #hotel_image').attr("style","display:block;margin-top:10px;");

                $('#summernote-edithotel').summernote('code', data.edithotel.hotel_details);

                //console.log(data.edithotel);
            });
        });

        // VIEW HOTEL
        $(document).on('click', '#viewhotelmodalbtn', function(e){
            e.preventDefault();
            $('#viewhotelmodal').modal('show');

            var id = $(this).data('id');

            $.get('adminwebsiteviewhotel/'+id, function(data){
                $('#viewhotelmodal #hotel_name').html(data.viewhotel.hotel_name);
                $('#viewhotelmodal #hotel_sku').html(data.viewhotel.hotel_sku);
                $('#viewhotelmodal #hotel_country').html(data.viewhotel.hotel_country);
                $('#viewhotelmodal #hotel_location').html(data.viewhotel.hotel_location);
                $('#viewhotelmodal #hotel_address').html(data.viewhotel.hotel_address);
                $('#viewhotelmodal #hotel_price').html(data.viewhotel.hotel_price);

                var $viewhotelrating = $("#viewhotelrating").rateYo();
                $viewhotelrating.rateYo("rating", data.viewhotel.hotel_rating);
                $viewhotelrating.rateYo("option", "readOnly", true);

                $('#viewhotelmodal #hotel_features').html(data.viewhotel.hotel_features);
                $('#viewhotelmodal #hotel_image').attr('src','public/backendimages/'+data.viewhotel.hotel_image);
                $('#viewhotelmodal #hotel_details').html(data.viewhotel.hotel_details);
            });
        });

    </script>

  @endsection
