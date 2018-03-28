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
                  <i class="fa fa-plane"></i>
               </div>
               <div class="header-title">
                  <h1>Tour Packages</h1>
                  <small>List of all Tour</small>
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
                                 <h4>Tour Packages List</h4>

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
								<a class="btn btn-add" href="#" data-toggle="modal" data-target="#package" > <i class="fa fa-plus"></i> Add New Package </a>
								<a class="btn btn-add" href="#" data-toggle="modal" data-target="#country" > <i class="fa fa-plus"></i> Add Country </a>
								<a class="btn btn-add" href="#" data-toggle="modal" data-target="#location" > <i class="fa fa-plus"></i> Add Location </a>
								<a class="btn btn-add" href="#" data-toggle="modal" data-target="#exin" > <i class="fa fa-plus"></i> Add Exclude/Include </a>
						   </div>
                        </div>
                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Tour Image</th>
                                       <th>Package Name</th>
                                       <th>Package Type</th>
                                       <th>Country</th>
                                       <th>Location</th>
                                       <th>Price</th>
                                       <th>Duration</th>
                                       <th width="122px">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								 @foreach($tour_packages as $tp)
                                    <tr>
                                       <td><img src="{{ URL::to('/') }}/public/backendimages/{{$tp->tour_image}}" class="img-circle" alt="User Image" width="50" height="50"> </td>
                                       <td>{{$tp->package_name}}</td>
                                       <td>{{$tp->general_package}}</td>
                                       <td>{{$tp->country}}</td>
                                       <td>{{$tp->location}}</td>
                                       <td>
                                         {{$tp->price}}
                                         @if($optionscurrency)
                           								{{$optionscurrency->currency}}
                           							 @endif
                                       </td>
                                       <td>{{$tp->duration}} Days</td>
                                       <td>
										    <a id="viewtourpackagesbtn" class="btn btn-add btn-sm" href="#" data-id="{{$tp->package_id}}"><i class="fa fa-eye"></i></a>
										    <a id="edittourpackagesbtn" class="btn btn-warning btn-sm" href="#" data-id="{{$tp->package_id}}"><i class="fa fa-pencil"></i></a>
                                            {!! Form::open(['method'=>'post','url'=>'adminwebsitedeletetourpackages/{{$tp->package_id}}','class'=>'pull-right delete-btn','enctype'=>'multipart/form-data']) !!}
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}
                                            <input type="hidden" name="package_id" value="{{$tp->package_id}}" >
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                            {!! Form::close() !!}
									   </td>
                                    </tr>
                                 @endforeach
                                 </tbody>
                              </table>
                              {{ $tour_packages->links() }}
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
                           <h3><i class="fa fa-plane m-r-5"></i> Add New Package </h3>
                        </div>

						<div class="modal-body">
                           <div class="row">
                               <div class="panel-body">

							{!! Form::open(['method'=>'post','url' => 'adminwebsiteinserttourpackages','class'=>'col-sm-12','enctype'=>'multipart/form-data']) !!}
                               {!! csrf_field() !!}
                              <div class="form-group">
                                 <label>Tour Package Name</label>
                                 <input type="text" name="package_name" class="form-control" placeholder="Enter Tour Package Name" required>
                              </div>
							  <div class="form-group">
                                 <label>Package SKU</label>
                                 <input type="text" name="package_sku" class="form-control" placeholder="Enter Tour Package SKU" required>
                              </div>
							  <div class="form-group">
								 <label>Main Package</label>
								 <div class="form-group">
								  <select class="form-control" name="main_package">
									<option value="" disabled selected>Select Package</option>
									<option>Land Package</option>
									<option>Full Package</option>
								  </select>
								 </div>
							  </div>
							  <div class="form-group">
								 <label>General Package Type</label>
								 <div class="form-group">
								  <select class="form-control" name="general_package">
									<option value="" disabled selected>Select Package</option>
									<option>In Bound Package</option>
									<option>Out Bound Package</option>
									<option>Special Package</option>
									<option>Domestic Package</option>
									<option>Family Package</option>
									<option>Honeymoon Package</option>
									<option>Single Package</option>
								  </select>
								 </div>
							  </div>
							  <div class="form-group">
                                 <label>Country</label>
								 <select class="js-example-basic-multiple" name="country[]" id="addTourLocationByChangingCountry" style="width:95%;"  multiple="multiple" required>
									@foreach($countryList as $cl)
									<option>{{$cl->country_name}}</option>
									@endforeach
								 </select>
                              </div>
                              <div class="form-group">
                                 <label>Locations</label>
                                 <select class="js-example-basic-multiple" name="location[]" id="addTourLocationByMultipleCountry" style="width:95%;"  multiple="multiple" required>

								 </select>
                              </div>
                              <div class="form-group">
                                 <label>Price</label>
                                 <input type="text" name="price" class="form-control" placeholder="Enter Price" required>
                              </div>

							  <div class="form-group">
                                 <label>Duration</label>
                                 <input type="text" name="duration" class="form-control" placeholder="Enter Duration" required>
                              </div>

							  <div class="form-group">
                                 <label>Tour Exclude</label>
								 <select class="js-example-basic-multiple" name="tour_exclude[]" style="width:95%;"  multiple="multiple">
									@foreach($exInList as $exIn)
									<option>{{$exIn->exin_name}}</option>
									@endforeach
								 </select>
                              </div>

							  <div class="form-group">
                                 <label>Tour Include</label>
								 <select class="js-example-basic-multiple" name="tour_include[]" style="width:95%;"  multiple="multiple">
									@foreach($exInList as $exIn)
									<option>{{$exIn->exin_name}}</option>
									@endforeach
								 </select>
                              </div>

							  <div class="form-group">
                                 <label>Arrival Date</label>
                                 <div class="input-group date form_date" >
                                    <input id='minMaxExample' type="text" name="arrival_date" style="z-index: 1050 !important;" class="form-control years"><span class="input-group-addon"><a href="#"><i class="fa fa-calendar"></i></a></span>
                                 </div>
                              </div>

							  <div class="form-group">
                                 <label>Departure Date</label>
                                 <div class="input-group date form_date" >
                                    <input id='minMaxExample2' type="text" name="departure_date" style="z-index: 1050 !important;" class="form-control years"><span class="input-group-addon"><a href="#"><i class="fa fa-calendar"></i></a></span>
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label>Tour Image</label>
                                 <input type="file" name="tour_image" required>
                              </div>
                              <div class="form-group">
                                 <label>Tour details</label>
                                 <textarea class="form-control" id="summernote" name="tour_details" rows="3"></textarea>
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
                           <h3><i class="fa fa-plane m-r-5"></i> Add Country </h3>
                        </div>

						<div class="modal-body">
                           <div class="row">
                               <div class="panel-body">

							{!! Form::open(['method'=>'post','url' => 'adminwebsiteinsertcountry','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
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

							{!! Form::open(['method'=>'post','url' => 'adminwebsiteinsertlocation','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
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


			<!--  Add Exclude/Include -->
            <div class="modal fade" id="exin" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-plane m-r-5"></i> Add Tour Exclude/Include  </h3>
                        </div>

						<div class="modal-body">
                            <div class="row">
                               <div class="panel-body">

							        {!! Form::open(['method'=>'post','url' => 'adminwebsiteinsertexin','class'=>'col-sm-6','enctype'=>'multipart/form-data']) !!}
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <label>Feature Name</label>
                                        <input type="text" name="exin_name" class="form-control" placeholder="Enter Feature Name" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" value="Save" class="btn btn-success" >
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
			    </div> <!-- /.modal-dialog -->
            </div>


            <!-- VIEW MODAL START -->
            <div class="modal fade" id="viewtourpackagesmodal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3><i class="fa fa-plane m-r-5"></i> View Tour Package </h3>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="panel-body">

                                    <table class="table table-bordered">
                                        <thead>
                                            <th width="220px">Name</th>
                                            <th>Value</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Tour Package Name</strong></td>
                                                <td id="package_name"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Package SKU</strong></td>
                                                <td id="package_sku"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Main Package</strong></td>
                                                <td id="main_package"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>General Package Type</strong></td>
                                                <td id="general_package"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Country</strong></td>
                                                <td id="country"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Locations</strong></td>
                                                <td id="location"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Price</strong></td>
                                                <td id="price"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Duration</strong></td>
                                                <td id="duration"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tour Exclude</strong></td>
                                                <td id="tour_exclude"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tour Include</strong></td>
                                                <td id="tour_include"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Arrival Date</strong></td>
                                                <td id="arrival_date"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Departure Date</strong></td>
                                                <td id="departure_date"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tour Image</strong></td>
                                                <td>
                                                    <img src="" id="tour_image" width="100%">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tour details</strong></td>
                                                <td id="tour_details"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  VIEW MODAL END -->

            <!-- EDIT MODAL START -->
            <div class="modal fade" id="edittourpackagesmodal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3><i class="fa fa-plane m-r-5"></i> Edit Tour Package </h3>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="panel-body">

                                    {!! Form::open(['method'=>'post','url'=>'adminwebsiteedittourpackagessave','class'=>'col-sm-12','enctype'=>'multipart/form-data']) !!}
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="package_id" id="package_id" value="" >
                                    <div class="form-group">
                                        <label>Tour Package Name</label>
                                        <input type="text" name="package_name" class="form-control" id="package_name" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Package SKU</label>
                                        <input type="text" name="package_sku" class="form-control" id="package_sku" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Main Package</label>
                                        <div class="form-group">
                                            <select class="form-control" name="main_package" id="main_package">
                                                <option value="" disabled selected>Select Package</option>
                                                <option>Land Package</option>
                                                <option>Full Package</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>General Package Type</label>
                                        <div class="form-group">
                                        <select class="form-control" name="general_package" id="general_package">
                                            <option value="" disabled selected>Select Package</option>
                                            <option>In Bound Package</option>
                                            <option>Out Bound Package</option>
                                            <option>Special Package</option>
                                            <option>Domestic Package</option>
                                            <option>Family Package</option>
                                            <option>Honeymoon Package</option>
                                            <option>Single Package</option>
                                            </select>
                                        </div>
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
                                        <label>Price</label>
                                        <input type="text" name="price" class="form-control" id="price" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Duration</label>
                                        <input type="text" name="duration" class="form-control" id="duration" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Tour Exclude</label>
                                        <select class="js-example-basic-multiple" id="tour_exclude" name="tour_exclude[]" style="width:95%;"  multiple="multiple">

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Tour Include</label>
                                        <select class="js-example-basic-multiple" name="tour_include[]" id="tour_include" style="width:95%;"  multiple="multiple">

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Arrival Date</label>
                                        <div class="input-group date form_date" >
                                            <input id='minMaxExample3' type="text" name="arrival_date" style="z-index: 1050 !important;" class="form-control years"><span class="input-group-addon"><a href="#"><i class="fa fa-calendar"></i></a></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Departure Date</label>
                                        <div class="input-group date form_date" >
                                            <input id='minMaxExample4' type="text" name="departure_date" style="z-index: 1050 !important;" class="form-control years"><span class="input-group-addon"><a href="#"><i class="fa fa-calendar"></i></a></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Tour Image</label>
                                        <input type="file" name="tour_image">
                                        <img src="" id="tour_image" width="240" style="display:none;">
                                    </div>

                                    <div class="form-group">
                                        <label>Tour details</label>
                                        <textarea class="form-control" id="summernote-editpackage" name="tour_details" rows="3"></textarea>
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
        $("#addTourLocationByChangingCountry").on('change', function(){
            var countryNameArr = $(this).val();
            if(countryNameArr != null){
                var countryNameStr = countryNameArr.toString();
                $('#addTourLocationByMultipleCountry').empty();
                $.get('travelcountrylocationname-json?countryname='+countryNameStr, function(data){
                    $.each(data, function(index, valuearr){
                        $.each(valuearr, function(index, value){
                            $('#addTourLocationByMultipleCountry').append('<option>'+value+'</option>');
                        });
                    });
                });
            }
        });


        // VIEW TOUR PACKAGE
        $(document).on('click', '#viewtourpackagesbtn', function(e){
            e.preventDefault();
            $('#viewtourpackagesmodal').modal('show');

            var id = $(this).data('id');

            $.get('adminwebsiteviewtourpackages/'+id, function(data){
                $('#viewtourpackagesmodal #package_name').html(data.viewpackage.package_name);
                $('#viewtourpackagesmodal #package_sku').html(data.viewpackage.package_sku);
                $('#viewtourpackagesmodal #main_package').html(data.viewpackage.main_package);
                $('#viewtourpackagesmodal #general_package').html(data.viewpackage.general_package);
                $('#viewtourpackagesmodal #country').html(data.viewpackage.country);
                $('#viewtourpackagesmodal #location').html(data.viewpackage.location);
                $('#viewtourpackagesmodal #price').html(data.viewpackage.price);
                $('#viewtourpackagesmodal #duration').html(data.viewpackage.duration);
                $('#viewtourpackagesmodal #tour_exclude').html(data.viewpackage.tour_exclude);
                $('#viewtourpackagesmodal #tour_include').html(data.viewpackage.tour_include);
                $('#viewtourpackagesmodal #arrival_date').html(data.viewpackage.arrival_date);
                $('#viewtourpackagesmodal #departure_date').html(data.viewpackage.departure_date);
                $('#viewtourpackagesmodal #tour_image').attr('src','public/backendimages/'+data.viewpackage.tour_image);
                $('#viewtourpackagesmodal #tour_details').html(data.viewpackage.tour_details);
            });
        });


        // EDIT TOUR PACKAGE
        $(document).on('click', '#edittourpackagesbtn', function(e){
            e.preventDefault();
            $('#edittourpackagesmodal').modal('show');

            var id = $(this).data('id');

            $.get('adminwebsiteedittourpackages/'+id, function(data){
                $('#edittourpackagesmodal #package_id').val(data.editpackage.package_id);
                $('#edittourpackagesmodal #package_name').val(data.editpackage.package_name);
                $('#edittourpackagesmodal #package_sku').val(data.editpackage.package_sku);
                $('#edittourpackagesmodal #main_package').val(data.editpackage.main_package);
                $('#edittourpackagesmodal #general_package').val(data.editpackage.general_package);
                $('#edittourpackagesmodal #price').val(data.editpackage.price);
                $('#edittourpackagesmodal #duration').val(data.editpackage.duration);

                var country_str = data.editpackage.country;
                var country = country_str.split(',');
                $('#edittourpackagesmodal #country').empty();
                $.each(country, function(index, value){
                    $('#edittourpackagesmodal #country').append('<option selected="selected">'+value+'</option>');
                });
                var country_not_in = data.countryName.filter(function(obj) { return country.indexOf(obj) == -1; });
                $.each(country_not_in, function(index, value){
                    $('#edittourpackagesmodal #country').append('<option>'+value+'</option>');
                });

                var location_str = data.editpackage.location;
                var location = location_str.split(',');
                $('#edittourpackagesmodal #location').empty();
                $.each(location, function(index, value){
                    $('#edittourpackagesmodal #location').append('<option selected="selected">'+value+'</option>');
                });
                $("#edittourpackagesmodal #country").on('change', function(){
                    var countryNameArr = $(this).val();
                    if(countryNameArr != null){
                        var countryNameStr = countryNameArr.toString();
                        $('#edittourpackagesmodal #location').empty();
                        $.get('travelcountrylocationname-json?countryname='+countryNameStr, function(data){
                            $.each(data, function(index, valuearr){
                                $.each(valuearr, function(index, value){
                                    $('#edittourpackagesmodal #location').append('<option>'+value+'</option>');
                                });
                            });
                        });
                    }
                });


                var tour_exclude_str = data.editpackage.tour_exclude;
                var tour_exclude = tour_exclude_str.split(',');
                $('#edittourpackagesmodal #tour_exclude').empty();
                $.each(tour_exclude, function(index, value){
                    $('#edittourpackagesmodal #tour_exclude').append('<option selected="selected">'+value+'</option>');
                });
                var tourexclude_not_in = data.exinlist.filter(function(obj) { return tour_exclude.indexOf(obj) == -1; });
                $.each(tourexclude_not_in, function(index, value){
                    $('#edittourpackagesmodal #tour_exclude').append('<option>'+value+'</option>');
                });

                var tour_include_str = data.editpackage.tour_include;
                var tour_include = tour_include_str.split(',');
                $('#edittourpackagesmodal #tour_include').empty();
                $.each(tour_include, function(index, value){
                    $('#edittourpackagesmodal #tour_include').append('<option selected="selected">'+value+'</option>');
                });
                var tourinclude_not_in = data.exinlist.filter(function(obj) { return tour_include.indexOf(obj) == -1; });
                $.each(tourinclude_not_in, function(index, value){
                    $('#edittourpackagesmodal #tour_include').append('<option>'+value+'</option>');
                });

                $('#edittourpackagesmodal #minMaxExample3').val(data.editpackage.arrival_date);
                $('#edittourpackagesmodal #minMaxExample4').val(data.editpackage.departure_date);
                $('#edittourpackagesmodal #tour_image').attr('src','public/backendimages/'+data.editpackage.tour_image);
                $('#edittourpackagesmodal #tour_image').attr("style","display:block;margin-top:10px;");

                $('#summernote-editpackage').summernote('code', data.editpackage.tour_details);

                //console.log(data.locationlist);
            });
        });
    </script>

  @endsection
