
    <ul>
        <li>
            <a href="{{url('customerhome')}}"><img src="assets/frontend/images/icon/dbl1.png" alt="" /> Profile </a>
        </li>
        <li>
            <a href="{{url('customerprofileedit')}}"><img src="assets/frontend/images/icon/dbl4.png" alt="" /> Settings </a>
        </li>
        <li style="margin-left:12px">
            <a href="{{ url('employeelogout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ url('customerlogout') }}" method="POST">
                {{ csrf_field() }}
            </form>
        </li>

    </ul>
