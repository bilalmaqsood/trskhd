
    <div class="roll_no_slip_area">
    <div class="text-center">
       <img src="{{asset('')}}/assets/images/{{isset($header->name)? $header->name : 'logo.png' }}" class="logo" alt="">
    </div>
    <div class="roll_slip_details">
        <div class="pull-right">
            <img src="{{asset($student->user->Image)}}" alt="student_img" class="thumbnail" style="width: 130px">
        </div>
        <h5><strong> <u>Roll No: {{$student->Roll_No}}</u> </strong></h5>

        <div class="pull-left">
            <p>Name:<strong>{{$student->user->First_Name}} {{$student->user->Last_Name}}</strong></p>
            <p>Registration No: <strong>{{$student->id}}</strong></p>
            <p>Date of Brith <strong>{{$student->user->DOB}}</strong></p>
        </div>
        
    </div>
    <div class="clear"></div>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>S#</th>
            <th>Subject</th>
            <th>Date</th>
            <th>Day</th>
            <th>Timing</th>
            <th>Room</th>
        </tr>
        </thead>
        <tbody>
            @if(count($exams) > 0)
                @foreach($exams->first()->details as $detail)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                    <td>{{$detail->book->name}}</td>
                    <td>{{parse($detail->Date)->format('F j, Y')}}</td>
                    <td>{{parse($detail->Date)->format('l')}}</td>
                    <td>{{parse($detail->Start_Time)->format("h:i A")}} to {{parse($detail->End_Time)->format("h:i A")}}</td>
                    <td> {{$detail->Room}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div class="pull-left">
        <span>Signature of Candidate: _______________</span>
        <span>Checked By: ______________</span>
    </div>
    <div class="pull-right">
        <h6><strong> Controller of Examinations </strong></h6>
    </div>
    <p>
        *NOTE:Any error found in the subject/s,date,time & photograph, must be reported to the Boards's office for correction before the commencement of the examination.
    </p>
</div>

<div class="clear40"></div>