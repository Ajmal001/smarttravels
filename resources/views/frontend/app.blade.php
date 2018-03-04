<!DOCTYPE html>
<html lang="en">

<head>
	<title>@yield('title')</title>
	<!--== META TAGS ==-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- FAV ICON -->
	<link rel="shortcut icon" href="{{ URL::to('/') }}/public/backendimages/{{$current_option->favicon}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:400,500,700" rel="stylesheet">
	<!-- FONT-AWESOME ICON CSS -->
	<link rel="stylesheet" href="{{URL::asset('assets/frontend/css/font-awesome.min.css')}}">
	<!--== ALL CSS FILES ==-->
	<link rel="stylesheet" href="{{URL::asset('assets/frontend/css/style.css')}}">
	<link rel="stylesheet" href="{{URL::asset('assets/frontend/css/materialize.css')}}">
	<link rel="stylesheet" href="{{URL::asset('assets/frontend/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{URL::asset('assets/frontend/css/mob.css')}}">
	<link rel="stylesheet" href="{{URL::asset('assets/frontend/css/animate.css')}}">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js does not work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Preloader -->
	<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>
	<!--====== MOBILE MENU ==========-->
	<section class="mob-top">
		<div class="mob-menu">
			<div class="mob-head-left"> <img src="images/logo.png" alt=""> </div>
			<div class="mob-head-right"> <a href="#"><i class="fa fa-bars mob-menu-icon" aria-hidden="true"></i></a> <a href="#" class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></a>
				<div class="mob-menu-slide">
					<h4>@yield('title')</h4>
					<ul class='top-menu'>
						<li><a href="{{url('/')}}">Home</a></li>
						<li><a href="{{url('/tourpackages')}}" >Package</a></li>
						<li><a href="{{url('/hotels')}}">Hotels</a></li>
						<li><a href="{{url('/sight')}}">Sight Seeing</a></li>
						<li><a href="{{url('/transfer')}}">Transfer</a></li>
						<li><a href="{{url('/attractions')}}">Attraction Tickets</a></li>
						<li><a href="{{url('/airticketbooking')}}">Air Ticket</a></li>
						<li><a href="{{url('/visa')}}">Visa Apply</a></li>

						<li id="main-menu-v2-book"><a href="{{url('/tourpackages')}}">Exclusive Packages</a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!--====== END MOBILE MENU ==========-->
	<!--====== TOP HEADER ==========-->
	<section>
		<div class="rows head" data-spy="affix" data-offset-top="120">
			<div class="container">
				<div>
					<!--====== BRANDING LOGO ==========-->
					<div class="col-md-4 col-sm-12 col-xs-12 head_left">
						<a href="{{url('/')}}"><img style="width:145px;height:31px;" src="{{ URL::to('/') }}/public/backendimages/{{$current_option->logo}}" alt="" /> </a>
					</div>
					<!--====== HELP LINE & EMAIL ID ==========-->
					<div class="col-md-8 col-sm-12 col-xs-12 head_right head_right_all">
						<ul>
							<li><a href="#">Help Line: {{$current_option->mobile}}</a> </li>
							<li><a href="#">Email: {{$current_option->email}}</a> </li>
							<li>
								<!--<div class="dropdown">
                                    <button class="dropbtn">My Account</button>
                                    <div class="dropdown-content">
                                        <a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                                        <a href="#"><i class="fa fa-address-book-o" aria-hidden="true"></i> Register with us</a>
                                        <a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i> My Bookings</a>
                                        <a href="#"><i class="fa fa-umbrella" aria-hidden="true"></i> Tour Packages</a>
                                        <a href="#"><i class="fa fa-bed" aria-hidden="true"></i> Hotel Bookings</a>
                                        <a href="#"><i class="fa fa-ban" aria-hidden="true"></i> Cancel Bookings</a>
                                        <a href="#"><i class="fa fa-print" aria-hidden="true"></i> Prient E-Tickets</a>
                                        <a href="#" class="ho-dr-con-last"><i class="fa fa-align-justify" aria-hidden="true"></i> Custom Tour Plan</a>
                                    </div>
								</div>	--><a class='dropdown-button waves-effect waves-light profile-btn' href="{{url('/accountlogin')}}" data-activates='myacc'><i class="fa fa-user" aria-hidden="true"></i> Login </a>
								<!-- Dropdown Structure -->
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--====== NAVIGATION MENU ==========-->
	<section>
		<div class="main-menu-v2">
			<div class="container">
				<div class="row">
					<ul>
						<li><a href="{{url('/')}}">Home</a></li>
						<li><a href="{{url('/tourpackages')}}" >Package</a></li>
						<li><a href="{{url('/hotels')}}">Hotels</a></li>
						<li><a href="{{url('/sight')}}">Sight Seeing</a></li>
						<li><a href="{{url('/transfer')}}">Transfer</a></li>
						<li><a href="{{url('/attractions')}}">Attraction Tickets</a></li>
						<li><a href="{{url('/airticketbooking')}}">Air Ticket</a></li>
						<li><a href="{{url('/visa')}}">Visa Apply</a></li>

						<li id="main-menu-v2-book"><a href="{{url('/tourpackages')}}"> Create A Tour Plan</a></li>
					</ul>
				<div>
			<div>
		<div>
	</section>

	 @section('body')

     @show


	<!--====== FOOTER 2 ==========-->
	<section>
		<div class="rows">
			<div class="footer">
				<div class="container">
					<div class="foot-sec2">
						<div>
							<div class="row" style="margin-top:40px">
								<div class="col-sm-3 foot-spec foot-com">
									<h4><span>Contact</h4>
									<p>Mobile: {{$current_option->mobile}}</p>
									<p>Email: {{$current_option->email}}</p>
								</div>
								<div class="col-sm-3 foot-spec foot-com">
									<h4><span>Address</span></h4>
									<p>{{$current_option->address}}</p>

								</div>
								<div class="col-sm-3 col-md-3 foot-spec foot-com">
									<h4><span>SERVICES</h4>
									<ul class="two-columns">
										<li><a href="{{url('/')}}">Home</a></li>
										<li><a href="{{url('/tourpackages')}}" >Package</a></li>
										<li><a href="{{url('/hotels')}}">Hotels</a></li>
										<li><a href="{{url('/sight')}}">Sight Seeing</a></li>
										<li><a href="{{url('/transfer')}}">Transfer</a></li>
										<li><a href="{{url('/attractions')}}">Attraction Tickets</a></li>
										<li><a href="{{url('/about')}}">About Us</a></li>
										<li><a href="{{url('/contact')}}">Contact Us</a></li>
									</ul>
								</div>
								<div class="col-sm-3 foot-social foot-spec foot-com">
									<h4><span>Follow</span> with us</h4>

									<ul>
										<li><a href="{{$current_option->social_facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
										<li><a href="{{$current_option->social_google}}"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
										<li><a href="{{$current_option->social_twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
										<li><a href="{{$current_option->social_linkedin}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
										<li><a href="{{$current_option->social_youtube}}"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--====== FOOTER - COPYRIGHT ==========-->
	<section>
		<div class="rows copy">
			<div class="container">
				<p>{{$current_option->copyright}}</p>
			</div>
		</div>
	</section>
	<section>
		<div class="icon-float">
			<ul>
				<li><a href="#" class="sh">1k <br> Share</a> </li>
				<li><a href="#" class="fb1"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
				<li><a href="#" class="gp1"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
				<li><a href="#" class="tw1"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
				<li><a href="#" class="li1"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
				<li><a href="#" class="wa1"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
				<li><a href="#" class="sh1"><i class="fa fa-envelope-o" aria-hidden="true"></i></a> </li>
			</ul>
		</div>
	</section>



	<!--========= Scripts ===========-->
	<script src="{{URL::asset('assets/frontend/js/jquery-latest.min.js')}}"></script>
	<script src="{{URL::asset('assets/frontend/js/jquery-ui.js')}}"></script>
	<script src="{{URL::asset('assets/frontend/js/bootstrap.js')}}"></script>
	<script src="{{URL::asset('assets/frontend/js/wow.min.js')}}"></script>
	<script src="{{URL::asset('assets/frontend/js/materialize.min.js')}}"></script>
	<script src="{{URL::asset('assets/frontend/js/custom.js')}}"></script>
	<script src="{{URL::asset('assets/backend/assets/plugins/select2/select2.min.js')}}" type="text/javascript"></script>
	<script>
	$(document).ready(function() {

		// Location Selector
		$(document).on('change','#country',function(){

		    var country_id=$(this).val();

		    //div=$(this).parent();

		    $op="";

		    $.ajax({
		         type:'get',
		         url:'{!!URL::to('findLocation')!!}',
		         data:{'id':country_id},
		         dataType:'json',//return data will be json
		         success:function(data){

		                $op += '<option value="0" selected disabled>Select City</option>';
		                for(var i=0;i<data.length;i++){
		                $op += '<option value="'+data[i].location_id+'">'+data[i].location_name+'</option>';
		                }

		                $(".v_location").html($op);
		                //$('.v_location').append($tp);
		                //div.find('.v_location').html(" ");
		               // div.find('.v_location').append($op);



		         },
		         error:function(){

		         }
		     });



		});


    //AUTO COMPLETE CITY SELECT
		$('#country.autocomplete').autocomplete({
			data: {

			<?php
			foreach($countryList as $cl){
			?>
				"<?php echo $cl->country_name ; ?>": null,
			<?php
			}
            ?>
			},
			limit: 8, // The max amount of results that can be shown at once. Default: Infinity.
			onAutocomplete: function(val) {
				// Callback function when value is autcompleted.
			},
			minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
		});

	//AUTO COMPLETE CITY SELECT
		$('#city.autocomplete').autocomplete({
			data: {

			<?php
			foreach($locationList as $ll){
			?>
				"<?php echo $ll->location_name ; ?>": null,
			<?php
			}
            ?>
			},
			limit: 8, // The max amount of results that can be shown at once. Default: Infinity.
			onAutocomplete: function(val) {
				// Callback function when value is autcompleted.
			},
			minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
		});



	});
	</script>

</body>

</html>
