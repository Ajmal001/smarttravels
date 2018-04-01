<ul>
    <li><a href="{{url('agenthome')}}"><img src="assets/frontend/images/icon/dbl6.png" alt="" /> Profile </a></li>
    <li><a href="{{url('agentsales')}}"><img src="assets/frontend/images/icon/dbl9.png" alt="" /> Sales </a></li>
    <li><a href="{{url('agentaccountsettings')}}"><img src="assets/frontend/images/icon/dbl7.png" alt="" /> Accounts </a></li>

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
