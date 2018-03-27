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
