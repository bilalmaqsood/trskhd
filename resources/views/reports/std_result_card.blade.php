@extends('layouts.app')

@section('css')

@endsection

@section('title' , 'All-Students')

@section('content')
<!-- header starts  -->
<div class="">
<section id="header">
    <div class="header_area">
                <!-- Start Navigation -->
    <nav class="navbar navbar-default bootsnav">

        <div class="container">            
            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="side-menu"><a href="#"><i class="fa fa-bars"></i></a></li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#brand"><img src="../assets/images/logo.png" class="logo" alt=""></a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="header_footer_logos.html">Change Logo</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>   

        <!-- Start Side Menu -->
        <div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <div class="widget">
                <h6 class="title">Menu</h6>
                <ul class="link">
                    <li><a href="view_stds_add.html">Student Addmission</a></li>
                    <li><a href="view_staff.html">Staff Registeration</a></li>
                    <li><a href="std_fees.html">Fees</a></li>
                    <li><a href="attendance_std.html">Attendance</a></li>
                    <li><a href="staff_attendance.html">Staff Attendance</a></li>
                    <li><a href="view_staff_salary.html">Staff Salary</a></li>
                    <li><a href="calendar.html">Holiday Calendar</a></li>
                    <li><a href="view_tests.html">Test Panel</a></li>
                    <li><a href="view_exam.html">Exam Panel</a></li>
                    <li><a href="roll_no_slip.html">Roll No Slip</a></li>
                    <li><a href="one_student_sms.html">One Student SMS</a></li>
                    <li><a href="students_sms.html">All Student SMS</a></li>
                    <li><a href="staff_sms.html">All Staff SMS</a></li>
                    <li><a href="sms_details.html">SMS Details</a></li>
                    <li><a href="section_strength_analysis.html">Strength Analysis</a></li>

                </ul>
            </div>
        </div>
        <!-- End Side Menu -->
    </nav>
    </nav>
    <!-- End Navigation -->
    </div>
</section>
</div>
<!-- header ends  -->
 <div class="heading_btns_area">
        <div class="container">
                <h2>Fee Report</h2>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="container">
        <div class="panel panel-primary">
          <div class="panel-heading">Filter</div>
          <div class="panel-body">
              <div class="col-sm-4">
                  <select name="year" class="form-control">
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                    </select>
              </div>
              <div class="col-sm-4">
                   <select name="month" class="form-control">
                        <option value="jan">January</option>
                        <option value="feb">February</option>
                        <option value="march">March</option>
                        <option value="apr">April</option>
                    </select>
              </div>
              <div class="col-sm-4">
                   <select name="class" class="form-control">
                            <option value="class1">Class one</option>
                            <option value="class2">Class two</option>
                            <option value="class3">Class three</option>
                            <option value="class4">Class four</option>
                    </select>
              </div>
              <div class="clear30"></div>
              <div class="download-btn col-sm-12">
                  <a href="#" class="btn btn-primary">PDF</a>
              </div>
          </div>
        </div>
    </div>


@endsection

@section('js')

@endsection

@section('scripts')
    @include('partials._scripts', ['model' => 'student'])
    @include('partials._status', ['model' => 'student'])
@endsection