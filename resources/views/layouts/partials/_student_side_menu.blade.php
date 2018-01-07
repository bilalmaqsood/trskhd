<div class="side">
    <a href="#" class="close-side"><i class="fa fa-times"></i></a>
    <div class="widget">
        <h6 class="title">Menu</h6>
        <ul class="link">
            <li><a href="{{route('attendance' , ['name' => AUth::user()->First_Name.'-'.AUth::user()->Last_Name] )}}">Attendance</a></li>
            <li><a href="{{route('tests')}}">Tests</a></li>
            <li><a href="{{route('exams')}}">Exams</a></li>
            <li><a href="roll_no_slip.html">Roll No Slip</a></li>
            <li><a href="{{route('single.sms_view')}}">SMS</a></li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            </li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
        </ul>
    </div>
</div>