
    <ul>
        <li>
            <a href="{{url('employeehome')}}"><img src="assets/frontend/images/icon/dbl6.png" alt="" /> Profile </a>
        </li>
        <li>
            <a href="{{url('employeetasks')}}"><img src="assets/frontend/images/icon/dbl3.png" alt=""/> Task List </a>
        </li>
        <li>
            <a href="{{url('employeeattendences')}}"><img src="assets/frontend/images/icon/dbl4.png" alt=""/> Attendence </a>
        </li>
        <li>
            <a href="{{url('employeesales')}}"><img src="assets/frontend/images/icon/dbl9.png" alt="" /> Sales </a>
        </li>
        </li>
        <li>
            <a href="{{url('employeeexpense')}}"><img src="assets/frontend/images/icon/dbl9.png" alt="" /> Expense </a>
        </li>
        <li>
            <a href="{{url('employeeaccount')}}"><img src="assets/frontend/images/icon/dbl7.png" alt="" /> Account </a>
        </li>
        <li style="margin-left:12px">
            <a href="{{ url('employeelogout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ url('employeelogout') }}" method="POST">
                {{ csrf_field() }}
            </form>
        </li>

    </ul>
