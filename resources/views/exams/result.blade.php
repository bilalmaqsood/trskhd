@extends('layouts.app')

@section('css')
    <style>
        @media screen
        {
            .td
            {
                width: 22%;
            }

            .td2
            {
                width: 56%;
            }

            .zaidi
            {
                display: block;
            }
        }

        @media print
        {
            .td
            {
                width: 1%;
            }

            .td2
            {
                width: 98%;
            }

            .zaidi
            {
                display: none;
            }
        }
    </style>
@endsection

@section('content')

    <div class="heading_btns_area">
        <div class="container">
            <h2 class="pull-left">Exam Details</h2>
            <div class="pull-right">
                
            </div>
        </div>

    </div>
    <div class="clear40"></div>

    <div>
       <table style="width: 100%">
            <tbody><tr>
                <td class="td"></td>
                <td class="td2" colspan="5">
                    <table style="width: 100%">
                        <tbody><tr style="width: 100%">
                            <td colspan="5" style="width: 100%; text-align: center">
                                <p style="color: black; font-size: 28px; font-weight: bold;">
                                    Student Exam
                                </p>
                            </td>
                        </tr>
                        <tr style="width: 100%">

                            <td style="width: 100%" colspan="5">
                                <table style="width: 100%">
                                    <tbody><tr style="width: 100%">
                                        <td style="width: 40%; text-align: left; font-size: large; font-style: oblique; text-underline-position: below;">

                                            <h5 style="color: black; font-style: normal">Roll No. <u>{{$student->Roll_No}} </u>
                                            </h5>

                                        </td>
                                        <td style="width: 20%">
                                            <img src="{{asset('')}}/assets/images/{{isset($header->name)? $header->name : 'logo.png' }}" class="logo" alt="">

                                        </td>
                                        <td colspan="2" style="width: 40%; text-align: right">
                                            <p style="color: black; font-style: normal">Registration No. <u style="width: 30%; font-weight: bold">{{$student->id}}</u> </p>
                                        </td>
                                    </tr>
                                    </tbody></table>
                            </td>

                        </tr>
                        <tr>
                            <td style="width: 90%">
                                <table style="width: 100%">

                                    <tbody><tr>
                                        <td style="width: 30%">
                                            <b>Student Name:</b>
                                        </td>
                                        <td style="width: 70%">
                                            <u style="text-align: left">{{$student->name}}</u>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 15%">
                                            <b>Father Name:</b>
                                        </td>
                                        <td style="width: 85%">
                                            <u style="text-align: left">{{$student['user']->Guardian}}</u>
                                        </td>
                                    </tr>



                                    </tbody></table>


                            </td>
                            <td style="width: 10%; text-align: right">
                                <img src="{{asset($student['user']->Image)}}" alt="student_image" class="thumbnail" style="width: 100px; height: 110px; object-fit: cover;">




                            </td>

                        </tr>




                        <tr>
                            <td colspan="5">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <td>Subjects</td>
                                            <td>Obtained Marks</td>
                                            <td>Passing Marks</td>
                                            <td>Total</td>
                                            <td>Status</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total = 0; @endphp
                                        @php $total_marks = 0; @endphp
                                        @php $obtained = 0; @endphp
                                        @foreach($student['studentClass']->books as $book)
                                            @php $total += $book->number($student['studentClass']->latestExam, $student['studentClass']->id, $student->id) @endphp

                                            @php $total_marks += $book->totalNumber($student['studentClass']->latestExam, $student['studentClass']->id, $student->id) @endphp

                                            @php $obtained = $book->number($student['studentClass']->latestExam, $student['studentClass']->id, $student->id) @endphp
                                            <tr style="text-align: center">
                                                <td>{{$book->name}}</td>
                                                <td>{{$obtained}}</td>
                                                <td>{{$book->passingNumber($student['studentClass']->latestExam, $student['studentClass']->id, $student->id)}}</td>
                                                <td>{{$book->totalNumber($student['studentClass']->latestExam, $student['studentClass']->id, $student->id)}}</td>
                                                <td>
                                                    @if($obtained >= 90)
                                                        {{'A+'}}
                                                    @elseif($obtained >= 80)
                                                        {{'A'}}
                                                    @elseif($obtained >= 70)
                                                        {{'B+'}}
                                                    @elseif($obtained >= 60)
                                                        {{'B'}}
                                                    @elseif($obtained >= 50)
                                                        {{'C+'}}
                                                    @elseif($obtained >= 40)
                                                        {{'C'}}
                                                    @elseif($obtained >= 30)
                                                        {{'D'}}
                                                    @elseif($book->passingNumber($student['studentClass']->latestExam, $student['studentClass']->id, $student->id) < 30)
                                                        {{'F'}}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    <tr>
                                        <td>Total</td>
                                        <td>{{$total}}</td>
                                        <td></td>
                                        <td colspan="2" class="text-center">{{$total_marks}}</td>
                                    </tr>
                                    </tbody>
                                </table>

                            </td>

                        </tr>

                        <tr>
                            <td colspan="6">

                                <p><b>The Candidate has passed and Obtained marks Five Hundred and Eighty Seven</b></p>
                            </td>
                        </tr>




                        <tr>
                            <td colspan="9" style="width: 100%; font-style: normal; font-size: small; text-align: justify">

                                <h4>NOTE:</h4><p>(i)This provisional result intimation is issued as a notice only. Errors and omissions excepted. If a candidate finds any discrepancy in the Result Intimation or desires correction in any of the particulars, he/she may contact the Board <u> within 30 days after the declaration of the result.</u> Any entry appearing in it does not itself confer any right or privilege independently for the grant of proper certificate, which will be issued under the Rules/ Regulations.<br>(ii) The Star (*) indicates that the candidate has passed the subject/s with concessional marks under Board Rule.<br>(iii) Candidate intending to apply for re-checking of his/her paper/s may apply Online within 15 days after declaration of the result. (iv) A candidate intending to improve his/her grade or marks is allowed to appear in Subject/s or Part-I or Part-II or both with examination opportunity within Two year of Passing relevant examination in the same group/subjects in current/prevalent syllabus. If the candidate qualified subject/s with concessional marks, he/she will also have to appear and qualify in those subject/s for improvement of marks/grade. In case a candidate fails to improve his/her marks/grade in any part of subject/s, his/her previous result will remain intact. A candidate may improve his/her marks in the concerned Board from where he/she already passed his/her examination. (v) If the result intimation is lost, the result intimation can be obtained by the candidate on payment of prescribed fee. </p>
                            </td>

                        </tr>
                        <tr>
                            <td colspan="6">

                                <b></b>
                            </td>
                        </tr>
                        <tr>

                            <td colspan="9">
                                <table style="width: 100%">
                                    <tbody><tr>
                                        <td colspan="5">
                                        </td>
                                        <td colspan="5" align="right">
                                            <br>

                                            CONTROLLER OF EXAMINATION
                                        </td>
                                    </tr>

                                    </tbody></table>

                            </td>
                        </tr>



                        </tbody></table>
                </td><td class="td"></td>
            </tr>
            </tbody></table>
    </div>

@endsection

@section('js')

@endsection