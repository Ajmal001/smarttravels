@extends('frontend.app')

@section('title', 'Customer Support')

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


			<div class="db-2">
				<div class="db-2-com db-2-main">
					<h4>Customer Support </h4>
					<div class="db-2-main-com db2-form-pay db2-form-com" id="customer_chat_box">
							<ul>
									@foreach($customersupports as $support)
									<li style="border: 1px solid #dcdcdc; padding-left: 12px;">
											@if($support->message_by == 'admin')
											<h5 class="label-danger label label-default">Customer Support</h5>
											@else
											<h5 class="label-success label label-default">Me </h5>
											@endif

											<p>
												{{ $support->created_at->format('d M Y') }} -
												<?php
												$date = $support->created_at;
	                       echo date('h:i A', strtotime($date));
												?>
											</p>
											<p>{!!$support->message_details!!}</p>
									</li>
									@endforeach
							</ul>
					</div>
				</div>
				<form  action="{{url('customersupportscreate')}}" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}

					<input type="hidden" name="message_by" value="customer">
					<input type="hidden" name="message_status" value="unseen">

					<div class="row">
						<div class="input-group col s12">
							<textarea id="summernote2" name="message_details" class="form-control" rows="8" cols="80" required></textarea>
						</div>
					</div>

					<div class="row">
						<div class="input-field col s12">
							<input type="submit" value="SEND MESSAGE" class="waves-effect waves-light full-btn">
						</div>
					</div>

				</form>
			</div>


			<!--RIGHT SECTION-->
			<div class="db-3">
				@include('frontend.customer.includes.exclusive_packages')
			</div>
		</div>
	</section>
	<!--END DASHBOARD-->




@endsection

@section('script')
	<script type="text/javascript">
		$(function () {
					 $("html, body").animate({
	scrollTop: $('html, body').get(0).scrollHeight-1000}, 1000);});
	</script>
@endsection
