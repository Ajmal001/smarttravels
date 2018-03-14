@extends('frontend.app')

@section('title', 'Sight Seeing')

@section('body')
	<!--====== BANNER ==========-->
	<section>
		<div class="rows inner_banner inner_banner_1">
			<div class="container">
				<h2><span>Now Book -</span> Your Top Sight Seeing Places</h2>
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
					<h2>Top <span>Sight Seeings</span></h2>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>
				</div>
				<div>

					@foreach($sightList as $sl)
					<a href="sightdetails/{{$sl->sight_id}}">
					<div class="col-md-4 col-sm-6 col-xs-12 b_packages">
						<div class="v_place_img"><img src="{{ URL::to('/') }}/public/backendimages/{{$sl->image}}" alt="Tour Booking" title="Tour Booking" /> </div>
						<div class="b_pack rows">
							<div class="col-md-8 col-sm-8">
								<h4><a href="sightdetails/{{$sl->sight_id}}">{{$sl->name}}<span class="v_pl_name">{{$sl->location}}</span></a></h4> </div>
							<div class="col-md-4 col-sm-4 pack_icon">

							</div>
						</div>
					</div>
					</a>
					@endforeach

					<div class="frontend-pagination">
						{{$sightList->links()}}
					</div>

				</div>
			</div>
		</div>
	</section>

   @endsection
