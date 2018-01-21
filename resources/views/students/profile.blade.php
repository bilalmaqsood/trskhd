@extends('layouts.app')

@section('css')
@endsection
@section('title' , 'User Profile')
@section('content')

    <div class="clear40"></div>

    <div class="heading_btns_area">
        <div class="container">
            <h2>View Student Details</h2>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="container">
        <div class="col-md-6">
            <div class="std-details-area">
                <img src="{{asset($student['user']->Image)}}" class="img-thumbnail center-block" align="std-img">
                <hr>
                <h5 class="text-center">Student Information</h5>
                <div class="std_information">
                    <hr>
                    <dl>
                        <div class="col-md-6">
                            <dt>Class</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$student['classes']->first()->name}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Roll No</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$student->Roll_No}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Registration ID</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$student->id}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Name</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$student['user']->First_Name ." ". $student['user']->Last_Name }}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>User Name</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$student['user']->username }}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>DOB</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$student['user']->DOB}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Guardian's Name</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$student['user']->Guardian}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>CNIC</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$student['user']->CNIC}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Phone</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$student['user']->Mobile}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Gender</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{ucfirst($student['user']->Gender)}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Medium</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{ucfirst($student->Medium)}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Religion</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{ucfirst($student['user']->Religion)}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Nationality</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$student['user']->Country}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Admission Date</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$student->Admission_Date}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Address</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$student['user']->Address}}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
        <div class="col-md-6">
        </div>
    </div>
    <div class="clear40"></div>

@endsection

@section('js')

@endsection