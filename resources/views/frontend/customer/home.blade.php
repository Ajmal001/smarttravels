@extends('frontend.app')

@section('title', 'Customer Profile')

@section('body')

<section>
		<div class="db">
			<!--LEFT SECTION-->
			<div class="db-l">
				  @include('frontend.customer.includes.profile')
				<div class="db-l-2">
					@include('frontend.customer.includes.sidebar')
				</div>
			</div>
			<!--CENTER SECTION-->
			<div class="db-2">
				<div class="db-2-com db-2-main">
					<h4>My Profile</h4>

					@if(Session::has('flash_message_update'))
							<span style="color:green;padding:10px;">{{ Session::get('flash_message_update') }}</span>
					@endif

					<div class="db-2-main-com db-2-main-com-table">
						<table class="responsive-table">
							<tbody>
								<tr>
									<td>Name</td>
									<td>:</td>
									<td>{{$customer->customer_name}}</td>
								</tr>

								<tr>
									<td>Email</td>
									<td>:</td>
									<td>{{$customer->email}}</td>
								</tr>

								<tr>
									<td>Address</td>
									<td>:</td>
									<td>{{$customer->customer_address}}</td>
								</tr>
								<tr>
									<td>National ID</td>
									<td>:</td>
									<td>{{$customer->customer_nid}}</td>
								</tr>
								<tr>
									<td>Phone</td>
									<td>:</td>
									<td>{{$customer->customer_phone}}</td>
								</tr>
								<tr>
									<td>Company</td>
									<td>:</td>
									<td>{{$customer->customer_company}}</td>
								</tr>
								<tr>
									<td>Country</td>
									<td>:</td>
									<td>{{$customer->customer_country}}</td>
								</tr>
								<tr>
									<td>City</td>
									<td>:</td>
									<td>{{$customer->customer_city}}</td>
								</tr>
								<tr>
									<td>Zip</td>
									<td>:</td>
									<td>{{$customer->customer_zip}}</td>
								</tr>
								<tr>
									<td>Profession</td>
									<td>:</td>
									<td>{{$customer->customer_profession}}</td>
								</tr>
								<tr>
									<td>Passport No</td>
									<td>:</td>
									<td>{{$customer->customer_passport_no}}</td>
								</tr>
								<tr>
									<td>Facebook</td>
									<td>:</td>
									<td>{{$customer->customer_facebook}}</td>
								</tr>
								<tr>
									<td>Linkedin</td>
									<td>:</td>
									<td>{{$customer->customer_linkedin}}</td>
								</tr>
								<tr>
									<td>Status</td>
									<td>:</td>
									<td>
										@if($customer->status)
										<span class="db-done">Active</span>
										@else
										<span class="db-done">Inctive</span>
										@endif
									</td>
								</tr>
							</tbody>
						</table>

					 <a href="{{url('customerprofileedit')}}" class="btn btn-info"><b>Edit Profile</b></a>
					</div>
				</div>
			</div>
			<!--RIGHT SECTION-->
			<div class="db-3">
				@include('frontend.customer.includes.exclusive_packages')
			</div>
		</div>
	</section>
	<!--END DASHBOARD-->

@endsection
