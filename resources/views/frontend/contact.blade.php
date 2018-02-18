@extends('frontend.app')

@section('title', 'Contact')

@section('body')

	<section>
		<div class="rows contact-map map-container">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6290413.804893654!2d-93.99620524741552!3d39.66116578737809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880b2d386f6e2619%3A0x7f15825064115956!2sIllinois%2C+USA!5e0!3m2!1sen!2sin!4v1469954001005" allowfullscreen></iframe>
		</div>
	</section>
	<!--====== QUICK ENQUIRY FORM ==========-->
	<section>
		<div class="form form-spac rows">
			<div class="container">
				<!-- TITLE & DESCRIPTION -->
				<div class="spe-title col-md-12">
					<h2>Holiday Tour <span>Contact us</span></h2>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 form_1 wow fadeInLeft" data-wow-duration="1s">
					<!--====== THANK YOU MESSAGE ==========-->
					<div class="succ_mess">Thank you for contacting us we will get back to you soon.</div>
					<form id="home_form" name="home_form" action="http://rn53themes.net/themes/demo/travelz/mail/send.php">
						<ul>
							<li>
								<input type="text" name="ename" value="" id="ename" placeholder="Name" required> </li>
							<li>
								<input type="tel" name="emobile" value="" id="emobile" placeholder="Mobile" required> </li>
							<li>
								<input type="email" name="eemail" value="" id="eemail" placeholder="Email id" required> </li>
							<li>
								<input type="text" name="esubject" value="" id="esubject" placeholder="Subject" required> </li>
							<li>
								<input type="text" name="ecity" value="" id="ecity" placeholder="City" required> </li>
							<li>
								<input type="text" name="ecount" value="" id="ecount" placeholder="Country" required> </li>
							<li>
								<textarea name="emess" cols="40" rows="3" id="text-comment" placeholder="Enter your message"></textarea>
							</li>
							<li>
								<input type="submit" value="Submit" id="send_button"> </li>
						</ul>
					</form>
				</div>
				<!--====== COMMON NOTICE ==========-->
				<div class="col-md-6 col-sm-6 col-xs-12 wow fadeInRight" data-wow-duration="1s">
					<div class="rows book_poly">
						<h3>Common Notice</h3>
						<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</p>
						<ul>
							<li>But the majority have suffered alteration in some form, by injected humour</li>
							<li>All the Lorem Ipsum generators on the Internet tend to repeat</li>
							<li>The generated Lorem Ipsum is therefore always free from repetition</li>
							<li>Proof : Id proof mandatory for tour travel</li>
							<li>available, but the majority have suffered alteration in some form</li>
							<li>It has survived not only five centuries, but also the leap</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	
 @endsection