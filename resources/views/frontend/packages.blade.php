@extends('frontend.app')

@section('title', 'Packages')

@section('body')


    <section>
        @if($optionsimage['image_package'])
          <div class="rows inner_banner" style="background-image:url(public/backendimages/{{$optionsimage['image_package']}})">
        @else
          <div class="rows inner_banner">
        @endif
            <div class="container">
                @if($optionsimage['package_heading'])
                <h2>{{$optionsimage['package_heading']}}</h2>
                @else
                <h2><span>Tour Package -</span> Top Family Packages In The World</h2>
                @endif
                <ul>
                  <li><a href="#inner-page-title">Home</a></li>
                  <li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                  <li><a href="#inner-page-title" class="bread-acti">Family Package</a></li>
                </ul>
                @if($optionsimage['package_description'])
                <p>{{$optionsimage['package_description']}}</p>
                @else
                <p>Book travel packages and enjoy your holidays with distinctive experience</p>
                @endif
            </div>
        </div>
    </section>
    <!--====== PLACES ==========-->
    <section>
        <div class="rows inn-page-bg com-colo">
            <div class="container inn-page-con-bg tb-space pad-bot-redu-5" id="inner-page-title">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title col-md-12">
                    <h2>Tour <span> packages</span></h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    <p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>
                </div>

                @foreach($tourPackages as $tp)
				<!--===== PLACES ======-->
                <div class="rows p2_2">
                    <div class="col-md-6 col-sm-6 col-xs-12 p2_1">
                        <div class="band"><img src="images/band.png" alt="" />
                        </div>
                        <img src="{{ URL::to('/') }}/public/backendimages/{{$tp->tour_image}}" alt="" />
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 p2">
                        <h3>{{$tp->package_name}}</h3>
                        <p>{{$tp->general_package}}</p>
                        <div class="ticket">
                            <ul>
                                <li>{{$tp->duration}}</li>
                                <li>Start Date : {{$tp->arrival_date}}</li>
                                <li>End Date : {{$tp->departure_date}}</li>
                            </ul>
                        </div>
                        <div class="featur">
                            <h4>{{$tp->price}} Tk</h4>
                            <ul>
                                <li>Locations: {{$tp->location}}</li>
                                <li>Include:  {{$tp->tour_include}}</li>
                                <li>Exclude:  {{$tp->tour_exclude}} </li>
                            </ul>
                        </div>
                        <div class="p2_book">
                            <ul>
                                <li><a href="{{ URL::to('/tourbooking/')}}/{{$tp->package_id }}" class="link-btn">Book Now</a>
                                </li>
                                <li><a href="tourdetails/{{$tp->package_id}}" class="link-btn">View Package</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--===== PLACES END ======-->
                @endforeach
								<div class="frontend-pagination">
									{{$tourPackages->links()}}
								</div>
            </div>
        </div>
    </section>

	@endsection
