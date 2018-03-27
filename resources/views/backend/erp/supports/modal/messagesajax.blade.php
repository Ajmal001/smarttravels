@foreach($customermessagesjson as $messages)
  @if($messages->message_by == 'customer')
  <div class="inbox-mail-details p-lr-10">
    <div class="m-t-20 border-all p-20">
      <div>
        <span class="badge badge-warn" style="font-size:15px">
          {{$messages->customer->customer_name}}
        </span>
        <span class="bg-custom badge" style="font-size:15px">
          <small>{{ $messages->created_at->format('d M Y') }} -
           <?php
           $date = $messages->created_at;
            echo date('h:i A', strtotime($date));
           ?></small>
        </span>
      </div>
      {!!$messages->message_details!!}
   </div>
  </div>
  @else
  <div class="inbox-mail-details p-lr-10 text-right">
    <div class="m-t-20 border-all bg-lightgray p-20">
      <div>
        <span class="badge badge-dang" style="font-size:15px">
          <small>Admin</small>
        </span>
        <span class="bg-custom badge" style="font-size:15px">
          <small>	{{ $messages->created_at->format('d M Y') }} -
           <?php
           $date = $messages->created_at;
            echo date('h:i A', strtotime($date));
           ?></small>
        </span>
      </div>
      {!! $messages->message_details !!}
   </div>
  </div>
  @endif
@endforeach
