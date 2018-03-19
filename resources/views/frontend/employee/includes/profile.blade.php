<div class="db-l-1">
  <ul>
    <li><img src="{{ URL::to('/') }}/public/backendimages/{{$employee->profile->employee_image}}" alt="" />
    </li>
    <li><span>{{$attendences_this_month}} </span> Attendence in <?php echo date("F"); ?></li>
    <li><span>{{$taskpending}}</span>Task Pending</li>
  </ul>
</div>
