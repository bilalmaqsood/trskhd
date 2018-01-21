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
                <a class="download btn margin-bottom-5 btn-wide btn-o btn-primary">
                    <i class="fa fa-download" aria-hidden="true"></i>
                </a>
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
                                    Result Card
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
                                            <img src="../assets/images/logo.png" class="logo" alt="" style="text-align: left; width: 220px">

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
                                            <u style="text-align: left">{{$student['user']->First_Name.' '.$student['user']->Last_Name}}</u>
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
                                    </tbody>
                                </table>
                            </td>
                            <td style="width: 10%; text-align: right">
                                <img src="{{asset($student['user']->Image)}}" alt="{{asset($student['user']->First_Name)}}" class="thumbnail" style="width: 100px; height: 110px; object-fit: cover;">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <table cellspacing="0" border="1" cellpadding="0" style="width: 100%;">
                                    <tbody>
                                        <tr>
                                            <td rowspan="2" style="text-align: center">
                                                <b style="text-align: center;">SUBJECTS</b>
                                            </td>
                                            <td colspan="3" style=" background-image:url('http://result.biselahore.com/Images/Box.png');text-align:center">
                                                <b>MAXIMUM MARKS</b>
                                            </td>
                                            <td colspan="3" style="text-align:center">
                                                <b>MARKS OBTAINED</b>
                                            </td>
                                            <td rowspan="2" style="text-align: center">
                                                <b>TOTAL</b>
                                            </td>
                                            <td rowspan="2" style="text-align: center">
                                                <b>STATUS</b>
                                            </td>
                                        </tr>
                                    <tr>
                                        <td style="text-align: center; background-image: url('http://result.biselahore.com/Images/Box.png');">
                                            <b>TH</b>
                                        </td>
                                        <td style="text-align: center; background-image: url('http://result.biselahore.com/Images/Box.png');">
                                            <b>PR</b>
                                        </td>
                                        <td style="text-align: center; background-image: url('http://result.biselahore.com/Images/Box.png');">
                                            <b>TOTAL</b>
                                        </td>
                                        <td style="text-align: center;">
                                            <b>TH-I</b>
                                        </td>
                                        <td style="text-align: center;">
                                            <b>TH-II</b>
                                        </td>
                                        <td style="text-align: center;">
                                            <b>PR</b>
                                        </td>
                                    </tr>
                                    <tr></tr>
                                        @foreach($student['studentClass']->books as $book)
                                            <tr style="text-align: center">
                                                <td style="text-align:left; font-weight:bold"> {{$book->name}}</td>
                                                <td style="text-align:center; background-image: url('http://result.biselahore.com/Images/Box.png');"> 75+75=150</td>
                                                <td style="text-align:center; background-image: url('http://result.biselahore.com/Images/Box.png');"> ---</td>
                                                <td style="text-align:center; background-image: url('http://result.biselahore.com/Images/Box.png');"> 150</td>
                                                <td style="text-align:center"> 41</td>
                                                <td style="text-align:center"> 49</td>
                                                <td style="text-align:center"> ---</td>
                                                {{--@php$result = $book->number($student['studentClass']->latestExam, $student['studentClass']->id, $student->id)@endphp--}}
                                                <td style="text-align:center"> {{$book->number($student['studentClass']->latestExam, $student['studentClass']->id, $student->id)}}</td>
                                                <td style="text-align:center"> {{""}}</td>
                                            </tr>
                                        @endforeach
                                        <tr style="text-align: center">
                                            <td colspan="1" style="text-align:center"> TOTAL </td>
                                            <td colspan="3" style="text-align:center; background-image: url('http://result.biselahore.com/Images/Box.png');"> 1100</td>
                                            <td colspan="5" style="text-align:center;font-weight:bold"> MARKS OBTAINED: PASS 587 C</td>
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

                                <h4>NOTE:</h4><p>(i)This provisional result intimation is issued as a notice only. Errors and omissions excepted. If a candidate finds any discrepancy in the Result Intimation or desires correction in any of the particulars, he/she may contact the Board <u> within 30 days after the declaration of the result.</u> Any entry appearing in it does not itself confer any right or privilege independently for the grant of proper certificate, which will be issued under the Rules/ Regulations.<br>(ii)	The Star (*) indicates that the candidate has passed the subject/s with concessional marks under Board Rule.<br>(iii) Candidate intending to apply for re-checking of his/her paper/s may apply Online within 15 days after declaration of the result. (iv)	A candidate intending to improve his/her grade or marks is allowed to appear in Subject/s or Part-I or Part-II or both with examination opportunity within Two year of Passing relevant examination in the same group/subjects in current/prevalent syllabus. If the candidate qualified subject/s with concessional marks, he/she will also have to appear and qualify in those subject/s for improvement of marks/grade. In case a candidate fails to improve his/her marks/grade in any part of subject/s, his/her previous result will remain intact. A candidate may improve his/her marks in the concerned Board from where he/she already passed his/her examination. (v) If the result intimation is lost, the result intimation can be obtained by the candidate on payment of prescribed fee. </p>
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
                                            <img src="http://result.biselahore.com/images/sign_NJ.png" style="width: 100px; height: 70px">
                                            <br>

                                            CONTROLLER OF EXAMINATION
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>

                            </td>
                        </tr>



                        </tbody>
                    </table>
                </td><td class="td"></td>
            </tr>
            </tbody></table>
    </div>

@endsection

@section('js')

@endsection