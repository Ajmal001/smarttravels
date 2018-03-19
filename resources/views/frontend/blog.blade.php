@extends('frontend.app')

@section('title', 'Blog')

@section('body')

	<section>
		<div class="rows inner_banner inner_banner_1">
			<div class="container">
				<h2><span>Best Tour -</span> Packages in your City</h2>
				<ul>
					<li><a href="#inner-page-title">Home</a> </li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
					<li><a href="#inner-page-title" class="bread-acti">Blog Posts</a> </li>
				</ul>
				<p>Book travel packages and enjoy your holidays with distinctive experience</p>
			</div>
		</div>
	</section>
	<!--====== ALL POST ==========-->
	<section>
		<div class="rows inn-page-bg com-colo">
			<div class="container inn-page-con-bg tb-space pad-bot-redu-5" id="inner-page-title">
				<!-- TITLE & DESCRIPTION -->
				<div class="spe-title col-md-12">
					<h2>Holiday Tour <span>Blog</span> Posts</h2>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>
				</div>
				<!--===== POSTS ======-->
				<div class="rows">
					<div class="posts">
						<div class="col-md-6 col-sm-6 col-xs-12"> <img src="images/iplace-6.jpg" alt="" /> </div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<h3>Thai island hopper east</h3>
							<h5><span class="post_author">Author: Johnson</span><span class="post_date">Date: 12th May,2016</span><span class="post_city">City: Illunois</span></h5>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p>
							<p>Randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p> <a href="blog-inner.html" class="link-btn">Read more</a> </div>
					</div>
					<div class="posts">
						<div class="col-md-6 col-sm-6 col-xs-12"> <img src="images/iplace-2.jpg" alt="" /> </div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<h3>We are Offering the hottest offers</h3>
							<h5><span class="post_author">Author: Johnson</span><span class="post_date">Date: 12th May,2016</span><span class="post_city">City: Illunois</span></h5>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p>
							<p>Randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p> <a href="blog-inner.html" class="link-btn">Read more</a> </div>
					</div>
					<div class="posts">
						<div class="col-md-6 col-sm-6 col-xs-12"> <img src="images/iplace-3.jpg" alt="" /> </div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<h3>Lorem ipsum dummy content</h3>
							<h5><span class="post_author">Author: Johnson</span><span class="post_date">Date: 12th May,2016</span><span class="post_city">City: Illunois</span></h5>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p>
							<p>Randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p> <a href="blog-inner.html" class="link-btn">Read more</a> </div>
					</div>
					<div class="posts">
						<div class="col-md-6 col-sm-6 col-xs-12"> <img src="images/iplace-4.jpg" alt="" /> </div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<h3>Lorem ipsum dummy content</h3>
							<h5><span class="post_author">Author: Johnson</span><span class="post_date">Date: 12th May,2016</span><span class="post_city">City: Illunois</span></h5>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p>
							<p>Randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p> <a href="blog-inner.html" class="link-btn">Read more</a> </div>
					</div>
				</div>
				<!--===== POST END ======-->
			</div>
		</div>
	</section>
	
   @endsection