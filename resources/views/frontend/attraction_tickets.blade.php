@extends('frontend.app')

@section('title', 'Attraction Tickets')

@section('body')
	<!--====== BANNER ==========-->
	<section>
			@if($optionsimage)
				<div class="rows inner_banner" style="background-image:url(public/backendimages/{{$optionsimage}})">
			@else
				<div class="rows inner_banner">
			@endif
			<div class="container">
				<h2><span>Now Book -</span> Attraction Tickets</h2>
				<ul>
					<li><a href="#inner-page-title">Home</a>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
					<li><a href="#inner-page-title" class="bread-acti">Sight Seeing</a>
					</li>
				</ul>
				<p>Book travel packages and enjoy your holidays with distinctive experience</p>
			</div>
		</div>
	</section>
	<!--====== PLACES ==========-->
	<section>
		<div class="rows inn-page-bg com-colo">
			<div class="container inn-page-con-bg tb-space pad-bot-redu" id="inner-page-title">
				<!-- TITLE & DESCRIPTION -->
				<div class="spe-title col-md-12">
					<h2>Top <span>Attraction Tickets</span></h2>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>
				</div>
				<div>

					@foreach($attractionsList as $al)
					<a href="attractiondetails/{{$al->id}}">
					<div class="col-md-4 col-sm-6 col-xs-12 b_packages">
						<div class="v_place_img"><img src="{{ URL::to('/') }}/public/backendimages/{{$al->image}}" alt="Tour Booking" title="Tour Booking" /> </div>
						<div class="b_pack rows">
							<div class="col-md-8 col-sm-8">
								<h4><a href="attractiondetails/{{$al->id}}">{{$al->name}}<span class="v_pl_name">{{$al->location}}</span></a></h4> </div>
							<div class="col-md-4 col-sm-4 pack_icon">

							</div>
						</div>
					</div>
					</a>
					@endforeach
					{{$attractionsList->links()}}
				</div>
			</div>
		</div>
	</section>

   @endsection
