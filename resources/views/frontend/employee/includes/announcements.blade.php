<h4> <span style="margin-left:45px; font-size:18px;font-weight: 700;">Announcement</span> </h4>
<ul>
    @foreach($announcements as $announcement)
    <li>
        <a href="#!">
            <h5>{{$announcement->announcement_title}}</h5>
            <span class="label-custom label label-info">{{$announcement->announcement_execute_date}}</span>
            <p style="padding-left: 0;">{{$announcement->announcement_description}}</p>
        </a>
    </li>
    @endforeach
</ul>