<div class="clear40"></div>

    <div class="container roll_no_slip_area">
    <div class="text-center">
        <img src="{{asset('')}}/assets/images/logo.png" class="logo" alt="">
    </div>
    <div class="roll_slip_details">
        <h5><strong> <u>Roll No: {{$student->Roll_No}}</u> </strong></h5>
        <div class="left">
            <p>Name:</p>
            <p>Father's Name:</p>
            <p>Registration No:</p>
            <p>Date of Brith</p>
        </div>
        <div class="pull-right">
            <img src="{{asset($student->user->Image)}}" alt="student_img" class="thumbnail" style="width: 130px">
        </div>
        <div class="right">
            <p><strong>{{$student->user->First_Name}}</strong></p>
            <p><strong>{{$student->user->Last_Name}}</strong></p>
            <p><strong>{{$student->id}}</strong></p>
            <p><strong>{{$student->user->DOB}}</strong></p>
        </div>

    </div>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>S#</th>
            <th>Subject</th>
            <th>Date</th>
            <th>Day</th>
            <th>Timing</th>
        </tr>
        </thead>
        <tbody>
            @if(count($exams) > 0)
                @foreach($exams->first()->details as $detail)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$detail->book->name}}</td>
                        <td>{{$detail->Date}}</td>
                        <td>{{parse($detail->Start_Date)->format('l')}}</td>
                        <td>{{parse($detail->Start_Time)->format("h:i A")}} to {{parse($detail->End_Time)->format("h:i A")}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div class="pull-left">
        <span>Signature of Candidate: _____________________________</span>
        <span>Checked By: ______________________________</span>
    </div>
    <div class="pull-right">
        <img src="{{asset('')}}/assets/images/sign.jpg" alt="sign" style="height: 50px; width: 130px">
        <h6><strong> Controller of Examinations </strong></h6>
    </div>
    <p>
        *NOTE:Any error found in the subject/s,date,time & photograph, must be reported to the Boards's office for correction before the commencement of the examination.
    </p>
</div>

<div class="clear40"></div>