@extends('layouts.app')

@section('css')
@endsection
@section('title' , 'User Profile')
@section('content')

    <div class="clear40"></div>

    <div class="heading_btns_area">
        <div class="container">
            <h2>View Teacher Details</h2>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="container">
        <div class="col-md-6">
            <div class="std-details-area">
                <img src="{{asset($teacher['user']->Image)}}" class="img-thumbnail center-block" align="std-img">
                <hr>
                <h5 class="text-center">Teacher Information</h5>
                <div class="std_information">

                    <dl>
                        {{--<div class="col-md-6">
                            <dt>Class</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$teacher['classes']->first()->name}}</dd>
                        </div>--}}
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Name</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$teacher['user']->First_Name ." ". $teacher['user']->Last_Name }}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Father Name</dt>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Designation</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$teacher->Designation}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Joining Date</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$teacher->Joining_Date}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Salary</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$teacher->Salary}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Increment At</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$teacher->Increment_At}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Increment</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$teacher->Increment}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Allowed Holidays</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$teacher->Allowed_Holidays}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>DOB</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$teacher['user']->DOB}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>CNIC</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$teacher['user']->CNIC}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Phone</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$teacher['user']->Mobile}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Gender</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{ucfirst($teacher['user']->Gender)}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Religion</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{ucfirst($teacher['user']->Religion)}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Nationality</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$teacher['user']->Country}}</dd>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-md-6">
                            <dt>Address</dt>
                        </div>
                        <div class="col-md-6">
                            <dd>{{$teacher['user']->Address}}</dd>
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