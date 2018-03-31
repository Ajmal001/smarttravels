<ul>
    <li><a href="{{url('agenthome')}}"><img src="assets/frontend/images/icon/dbl1.png" alt="" /> Profile </a></li>
    <li><a href="{{url('agentprofileedit')}}"><img src="assets/frontend/images/icon/dbl4.png" alt="" /> Edit Profile </a></li>
    <li><a href="{{url('agentaccountsettings')}}"><img src="assets/frontend/images/icon/dbl4.png" alt="" /> Accounts </a></li>
    
    <li style="margin-left:12px">
        <a href="{{ url('agentlogout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ url('agentlogout') }}" method="POST">
            {{ csrf_field() }}
        </form>
    </li>

</ul>
