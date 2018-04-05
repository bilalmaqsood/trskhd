<!DOCTYPE html>
<html>
<head>
    <title>Student Result Card</title>
    <style>

        .roll_slip_details p {
            margin-bottom: 0;
        }

        .hr_border_dotted {
            border-color: #000;
            border-width: 1px;
            border-style: dotted;
        }

        .fee_slip_area p {
            margin-bottom: 0;
        }

        .fee_slip_area {
            -webkit-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.75);
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.75);
            padding: 25px;
        }

        .roll_no_slip_area {
            -webkit-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.75);
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.75);
            padding: 25px;
        }

        .salary_slip_area {
            -webkit-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.75);
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.75);
            padding: 25px;
        }

        .salary_slip_details p {
            margin-bottom: 0;
        }

        p {
            margin-bottom: 0;
            font-size: 16px;
        }

        .roll_slip_details p {
            margin-bottom: 0;
        }

        .hr_border_dotted {

            border-color: #000;

            border-width: 1px;

            border-style: dotted;

        }

        .fee_slip_area p {

            margin-bottom: 0;

        }

        .salary_slip_details p {

            margin-bottom: 0;

        }

        .text-center {
            text-align: center;
        }

        .pull-right {
            float: right !important;
        }

        .thumbnail {
            display: block;
            padding: 4px;
            margin-bottom: 20px;
            line-height: 1.42857143;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            -webkit-transition: border .2s ease-in-out;
            -o-transition: border .2s ease-in-out;
            transition: border .2s ease-in-out;
        }

        .clear, .clear1, .clear2, .clear3, .clear4, .clear5, .clear10, .clear20, .clear30, .clear40, .clear50, .clear80 {
            clear: both;
            font-size: 0px;
            line-height: 0px;
        }

        .clear {
            height: 0px;
        }

        .clear1 {
            height: 1px;
        }

        .clear2 {
            height: 2px;
        }

        .clear3 {
            height: 3px;
        }

        .clear4 {
            height: 4px;
        }

        .clear5 {
            height: 5px;
        }

        .clear10 {
            height: 10px;
        }

        .clear20 {
            height: 20px;
        }

        .clear30 {
            height: 30px;
        }

        .clear40 {
            height: 40px;
        }

        .clear80 {
            height: 40px;
        }

        .clear50 {
            height: 53px;
        }

        table {
            background-color: transparent;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .table-bordered {
            border: 1px solid #ddd;
        }

        .table {
            margin-bottom: 20px;
            max-width: 100%;
            width: 100%;
        }

        .table-striped > tbody > tr:nth-of-type(2n+1) {
            background-color: #f9f9f9;
        }

        .table-striped > tbody > tr:nth-of-type(2n+1) {
            background-color: #f9f9f9;
        }

        .table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
            border: 1px solid #ddd;
        }

        .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
            border-top: 1px solid #ddd;
            line-height: 1.42857;
            padding: 8px;
            vertical-align: top;
            font-size: 14px;
        }

        .text-right {
            text-align: right;
        }

        .row {
            margin-left: -15px;
            margin-right: -15px;
        }

        dl {
            margin-bottom: 0px;
            margin-top: 0;
        }

        .col-md-3 {
            width: 25%;
        }

        .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9 {
            float: left;
        }

        .col-sm-3 {
            width: 25%;
        }

        .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9 {
            float: left;
        }

        .col-xs-3 {
            width: 25%;
        }

        .col-md-9 {
            width: 75%;
        }

        .col-sm-9 {
            width: 75%;
        }

        .col-xs-9 {
            width: 75%;
        }

        .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
            float: left;
        }

        .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
            min-height: 1px;
            padding-left: 15px;
            padding-right: 15px;
            position: relative;
        }

        .panel {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .panel-default > .panel-heading {
            background-color: #f5f5f5;
            border-color: #ddd;
            color: #333;
        }

        .panel-heading {
            border-bottom: 1px solid transparent;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            padding: 10px 15px;
        }

        .panel-body {
            padding: 15px;
            padding-top: 0;
            padding-left: 50px;
        }

        .panel-body p {
            margin-bottom: 0px;
        }

        .panel-footer {
            background-color: #f5f5f5;
            border-bottom-left-radius: 3px;
            border-bottom-right-radius: 3px;
            border-top: 1px solid #ddd;
            padding: 10px 15px;
        }

        dt {
            font-weight: 700;
        }

        .amount-area {
            position: relative;
        }

        .amount-area .right {
            width: 50%;
            max-width: 100%;
            float: right;
            position: relative;
            right: 0;
            margin-right: 0;
            margin-left: auto;
        }

        .no-padding {
            padding-right: 0;
            padding-left: 0;
        }

        .col-md-4 {
            width: 33.33333333%;
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        h5 {
            margin-bottom: 0;
        }

        .pull-left {
            float: left;
        }

        .pull-right {
            float: right;
        }
    </style>
</head>
<body>
<div>
    <div class="col-sm-3">
        <h5 style="color: black; font-style: normal">Roll No. <u>{{$student->Roll_No}} </u></h5>
    </div>
    <div class="col-sm-3">
        <img src="{{asset('')}}/assets/images/{{isset($header->name)? $header->name : 'logo.png' }}" class="logo"
             alt="">
    </div>
    <div class="col-sm-3 text-right">
        <p style="color: black; font-style: normal">Registration No. <u
                    style="width: 30%; font-weight: bold">{{$student->id}}</u></p>
    </div>
    <div class="clear20"></div>
    <div class="pull-left"><b>Student Name:</b> {{$student->name}}<br> <b>Father Name:</b> <u
                style="text-align: left">{{$student['user']->Guardian}}</u></div>
    <div class="pull-right"><img src="{{asset($student['user']->Image)}}" alt="student_image" class="thumbnail"
                                 style="width: 100px; height: 110px; object-fit: cover;"></div>
    <div class="clear20"></div>

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

            @php $total += $book->number($exam, $class_id, $student->id) @endphp

            @php $total_marks += $book->totalNumber($exam, $class_id, $student->id) @endphp

            @php $obtained = $book->number($exam, $class_id, $student->id) @endphp
            <tr style="text-align: center">
                <td>{{$book->name}}</td>
                <td>{{$obtained}}</td>
                <td>{{$book->passingNumber($exam, $class_id, $student->id)}}</td>
                <td>{{$book->totalNumber($exam, $class_id, $student->id)}}</td>
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
                    @elseif($book->passingNumber($exam, $class_id, $student->id) < 30)
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

    <div class="clear0"></div>

    <p><b>The Candidate has passed and Obtained marks Five Hundred and Eighty Seven</b></p>
    <div class="clear10"></div>
    <div style="width: 100%; font-style: normal; font-size: small; text-align: justify">

        <h4>NOTE:</h4>
        <p>(i)This provisional result intimation is issued as a notice only. Errors and omissions excepted. If a
            candidate finds any discrepancy in the Result Intimation or desires correction in any of the particulars,
            he/she may contact the Board <u> within 30 days after the declaration of the result.</u> Any entry appearing
            in it does not itself confer any right or privilege independently for the grant of proper certificate, which
            will be issued under the Rules/ Regulations.<br>(ii) The Star (*) indicates that the candidate has passed
            the subject/s with concessional marks under Board Rule.<br>(iii) Candidate intending to apply for
            re-checking of his/her paper/s may apply Online within 15 days after declaration of the result. (iv) A
            candidate intending to improve his/her grade or marks is allowed to appear in Subject/s or Part-I or Part-II
            or both with examination opportunity within Two year of Passing relevant examination in the same
            group/subjects in current/prevalent syllabus. If the candidate qualified subject/s with concessional marks,
            he/she will also have to appear and qualify in those subject/s for improvement of marks/grade. In case a
            candidate fails to improve his/her marks/grade in any part of subject/s, his/her previous result will remain
            intact. A candidate may improve his/her marks in the concerned Board from where he/she already passed
            his/her examination. (v) If the result intimation is lost, the result intimation can be obtained by the
            candidate on payment of prescribed fee. </p>
    </div>


    <p> CONTROLLER OF EXAMINATION </p>
</div>
</body>
</html>

