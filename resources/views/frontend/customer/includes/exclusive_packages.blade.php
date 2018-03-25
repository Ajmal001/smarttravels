<h4> <span style="font-size:18px;font-weight:700;">Exclusive Packages</span> </h4>
  <ul>
    @foreach($exclusive_packages as $ep)
    <li>
      <a href="tourdetails/{{$ep->package_id}}"> <img src="{{ URL::to('/') }}/public/backendimages/{{$ep->tour_image}}" alt="" />
        <h5>{{$ep->package_name}}</h5>
        <p>Start Date : {{$ep->arrival_date}}</p>
        <p>End Date : {{$ep->departure_date}}</p>
      </a>
    </li>
    @endforeach
  </ul>
