<ul class="list-unstyled components">
             <p>Staff Menu</p>
            
            <li><a href="{{route('calender')}}">Holiday Calendar</a></li>
            
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            </li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
        </ul>
