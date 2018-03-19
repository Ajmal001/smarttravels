@extends('frontend.app')

@section('title', 'Events')

@section('body')

	<section>
		<div class="rows inner_banner inner_banner_5">
			<div class="container">
				<h2><span>Book -</span> Your Favourite Events Now!</h2>
				<ul>
					<li><a href="#inner-page-title">Home</a>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
					<li><a href="#inner-page-title" class="bread-acti">Events</a>
					</li>
				</ul>
				<p>Book travel packages and enjoy your holidays with distinctive experience</p>
			</div>
		</div>
	</section>
	<!--====== EVENTS ==========-->
	<section>
		<div class="rows inn-page-bg com-colo">
			<div class="container inn-page-con-bg events events-1 tb-space" id="inner-page-title">
				<!-- TITLE & DESCRIPTION -->
				<div class="spe-title col-md-12">
					<h2>Travel <span> Events</span></h2>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>
				</div>
				<div class="col-md-12">
					<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Event Name.." title="Type in a name">
					<table id="myTable">
						<tbody>
							<tr>
								<th></th>
								<th>Event Name</th>
								<th class="e_h1">Date</th>
								<th class="e_h1">Time</th>
								<th class="e_h1">Location</th>
								<th>Book</th>
							</tr>
							<tr>
								<td>1</td>
								<td><img src="images/iplace-1.jpg" alt="" /><a href="#" class="events-title">Taj Mahal,Agra, India</a> </td>
								<td class="e_h1">16.12.2016</td>
								<td class="e_h1">10.00 PM</td>
								<td class="e_h1">Australia</td>
								<td><a href="booking.html" class="link-btn">Book Now</a> </td>
							</tr>
							<tr>
								<td>2</td>
								<td><img src="images/iplace-2.jpg" alt="" /><a href="#" class="events-title">Salesforce Summer, Dubai</a> </td>
								<td class="e_h1">16.12.2016</td>
								<td class="e_h1">10.00 PM</td>
								<td class="e_h1">Dubai</td>
								<td><a href="booking.html" class="link-btn">Book Now</a> </td>
							</tr>
							<tr>
								<td>3</td>
								<td><img src="images/iplace-3.jpg" alt="" /><a href="#" class="events-title">God Towers, TOKYO, JAPAN</a> </td>
								<td class="e_h1">16.12.2016</td>
								<td class="e_h1">10.00 PM</td>
								<td class="e_h1">JAPAN</td>
								<td><a href="booking.html" class="link-btn">Book Now</a> </td>
							</tr>
							<tr>
								<td>4</td>
								<td><img src="images/iplace-4.jpg" alt="" /><a href="#" class="events-title">TOUR DE ROMANDIE, Switzerland</a> </td>
								<td class="e_h1">16.12.2016</td>
								<td class="e_h1">10.00 PM</td>
								<td class="e_h1">Switzerland</td>
								<td><a href="booking.html" class="link-btn">Book Now</a> </td>
							</tr>
							<tr>
								<td>5</td>
								<td><img src="images/iplace-5.jpg" alt="" /><a href="#" class="events-title">TOUR DE POLOGNE, Poland</a> </td>
								<td class="e_h1">16.12.2016</td>
								<td class="e_h1">10.00 PM</td>
								<td class="e_h1">Poland</td>
								<td><a href="booking.html" class="link-btn">Book Now</a> </td>
							</tr>
							<tr>
								<td>6</td>
								<td><img src="images/iplace-6.jpg" alt="" /><a href="#" class="events-title">Future of Marketing,Sydney, Australia</a> </td>
								<td class="e_h1">16.12.2016</td>
								<td class="e_h1">10.00 PM</td>
								<td class="e_h1">Australia</td>
								<td><a href="booking.html" class="link-btn">Book Now</a> </td>
							</tr>
							<tr>
								<td>7</td>
								<td><img src="images/iplace-7.jpg" alt="" /><a href="#" class="events-title">Eiffel Tower, Paris</a> </td>
								<td class="e_h1">16.12.2016</td>
								<td class="e_h1">10.00 PM</td>
								<td class="e_h1">France</td>
								<td><a href="booking.html" class="link-btn">Book Now</a> </td>
							</tr>
							<tr>
								<td>8</td>
								<td><img src="images/iplace-8.jpg" alt="" /><a href="#" class="events-title">PARIS - ROUBAIX, England</a> </td>
								<td class="e_h1">16.12.2016</td>
								<td class="e_h1">10.00 PM</td>
								<td class="e_h1">England</td>
								<td><a href="booking.html" class="link-btn">Book Now</a> </td>
							</tr>
							<tr>
								<td>9</td>
								<td><img src="images/iplace-9.jpg" alt="" /><a href="#" class="events-title">Dubai Beach Resort, Dubai</a> </td>
								<td class="e_h1">16.12.2016</td>
								<td class="e_h1">10.00 PM</td>
								<td class="e_h1">Dubai</td>
								<td><a href="booking.html" class="link-btn">Book Now</a> </td>
							</tr>
							<tr>
								<td>10</td>
								<td><img src="images/iplace-4.jpg" alt="" /><a href="#" class="events-title">TOUR DE POLOGNE, Poland</a> </td>
								<td class="e_h1">16.12.2016</td>
								<td class="e_h1">10.00 PM</td>
								<td class="e_h1">Poland</td>
								<td><a href="booking.html" class="link-btn">Book Now</a> </td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	
	   @endsection