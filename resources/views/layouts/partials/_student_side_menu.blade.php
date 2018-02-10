<ul class="list-unstyled components">
    <p>Student Menu</p>
    <li><a href="{{route('attendance' , ['name' => AUth::user()->First_Name.'-'.AUth::user()->Last_Name] )}}">Attendance</a></li>
    <li><a href="{{route('tests')}}">Tests</a></li>
    <li><a href="{{route('calender')}}">Holiday Calendar</a></li>
    <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    </li>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
</ul>