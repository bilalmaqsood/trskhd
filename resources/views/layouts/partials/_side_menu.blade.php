        <ul class="list-unstyled components">
             <p>Admin Menu</p>
             <li class="active">
                <a href="#student" data-toggle="collapse" aria-expanded="false">Students</a>
                    <ul class="collapse list-unstyled" id="student">
                        <li><a href="{{route('student.index')}}">Student</a></li>
                        <li><a href="{{route('attendance.index')}}">Students Attendance</a></li>
                         
                    </ul>
                </li>
            <li>
                <a href="#staff" data-toggle="collapse" aria-expanded="false">Staff</a>
                <ul class="collapse list-unstyled" id="staff">
                    <li><a href="{{route('teacher.index')}}">Teachers</a></li>
                    <li><a href="{{route('teachersAttendance')}}">Teachers Attendance</a></li>
                </ul>
            </li>
            <li>
                 <a href="#classes" data-toggle="collapse" aria-expanded="false">Classes</a>
                 <ul class="collapse list-unstyled" id="classes">
                      <li><a href="{{route('classes.index')}}">Classes</a></li>
                 </ul>
            </li>
            <li>
                 <a href="#fees" data-toggle="collapse" aria-expanded="false">Fees</a>
                 <ul class="collapse list-unstyled" id="fees">
                     <li><a href="{{route('fee.index')}}">Fees</a></li>
                 </ul>
            </li>

            <li>
                 <a href="#calendar" data-toggle="collapse" aria-expanded="false">Calendar</a>
                  <ul class="collapse list-unstyled" id="calendar">
                      <li><a href="{{route('calender')}}">Holiday Calendar</a></li>
                  </ul>
            </li>
             <li>
                 <a href="#test" data-toggle="collapse" aria-expanded="false">Test</a>
                 <ul class="collapse list-unstyled" id="test">
                     <li><a href="{{route('test.index')}}">Test Panel</a></li>
                 </ul>
            </li>
            <li>
                 <a href="#exam" data-toggle="collapse" aria-expanded="false">Exam</a>
                 <ul class="collapse list-unstyled" id="exam">
                    <li><a href="{{route('exam.index')}}">Exam Panel</a></li>
                </ul>
            </li>
            
            <li>
                 <a href="#sms" data-toggle="collapse" aria-expanded="false">SMS</a>
                 <ul class="collapse list-unstyled" id="sms">
                    <li><a href="{{route('sms.index')}}">SMS Details</a></li>
                    <li><a href="{{route('single.sms_view')}}">One Student SMS</a></li>
                    <li><a href="{{route('SendAllStudentsSms')}}">All Student SMS</a></li>
                    <li><a href="{{route('SendAllStaffSms')}}">All Staff SMS</a></li>
                 </ul>
            </li>
             <li>
                 <a href="#report" data-toggle="collapse" aria-expanded="false">Reports</a>
                 <ul class="collapse list-unstyled" id="report">
                    <li><a href="{{route('reports.index',['type'=>'fee_slip'])}}">Fee Slip</a></li>
                    <li><a href="{{route('reports.index',['type'=>'roll_no_slip'])}}">Roll No Slip</a></li>
                    <li><a href="{{route('reports.index',['type'=>'salary_slip'])}}">Salary Slip</a></li>
                    <li><a href="{{route('reports.index',['type'=>'staff_card'])}}">Staff Card</a></li>
                    <li><a href="{{route('reports.index',['type'=>'student_card'])}}">Student Card</a></li>
                    <li><a href="{{route('reports.index',['type'=>'student_result_card'])}}">Student Result Card</a></li>
                    <li><a href="{{route('reports.index',['type'=>'std_attendance'])}}">Student Register</a></li>
                    <li><a href="{{route('reports.index',['type'=>'staff_attendance'])}}">Staff Register</a></li>
                 </ul>
            </li>
            
            <li><a href="{{route('school_info')}}">School Information</a></li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            </li>
           
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
               
        </ul>
