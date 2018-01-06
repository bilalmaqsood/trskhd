@extends('layouts.app')

@section('css')

@endsection

@section('title' , 'Edit-Student')

@section('content')

    <div class="clear40"></div>
    <div class="container">
        <div class="jumbotron">
            <h2 class="">Student</h2>
        </div>
        <form method="post" action="{{route('student.update' , [$student->id])}}"  enctype="multipart/form-data">
            <div class="col-md-6">
                <div class=" form-group">
                    <label class="control-label">Select Class</label> <span class="symbol required" aria-required="true"></span>
                    <select id=""  name="class_id" class="form-control">

                        <option selected="selected" disabled="disabled">Select Admission Section of Student.</option>
                        @foreach($classes as $class)
                            <option {{($student->class_id == $class->id) ? "selected" : ""}} value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class=" form-group">
                    <label class="control-label">First name</label> <span class="symbol required" aria-required="true"></span>
                    <input id="first_name" placeholder="First Name" required="required" value="{{$student['user']->First_Name}}"  name="First_Name" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Last name</label> <span class="symbol required" aria-required="true"></span>
                    <input id="last_name" placeholder="Last_Name" required="required" value="{{$student['user']->Last_Name}}" name="Last_Name" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Date of Brith</label> <span class="symbol required" aria-required="true"></span>
                    <input id="datepicker" placeholder="DOB" required="required" value="{{$student['user']->DOB}}" name="DOB" type="date" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Father / Husband</label> <span class="symbol required" aria-required="true"></span>
                    <input placeholder="Guardian's Name" required="required" value="{{$student['user']->Guardian}}" name="Guardian" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">CNIC No</label> <span class="symbol required" aria-required="true"></span>
                    <input placeholder="CNIC No" required="required" value="{{$student['user']->CNIC}}" name="CNIC" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Mobile No</label> <span class="symbol required" aria-required="true"></span>
                    <input placeholder="Phone No" required="required" value="{{$student['user']->Mobile}}" name="Mobile" id="mobile" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Gender</label> <span class="symbol required" aria-required="true"></span>
                    <div class="clearfix"></div>
                    <div class="radio clip-radio radio-success radio-inline">
                        <input type="radio" id="radio1" {{($student['user']->Gender == "male" ? "checked" : "")}} name="Gender" value="male">
                        <label for="radio1">
                            Male
                        </label>
                    </div>
                    <div class="radio clip-radio radio-success radio-inline">
                        <input type="radio" id="radio2" {{($student['user']->Gender  == "female" ? "checked" : "")}} name="Gender" value="female">
                        <label for="radio2">
                            Female
                        </label>
                    </div>
                </div>
                <div class=" form-group">
                    <label class="control-label">Medium</label> <span class="symbol required" aria-required="true"></span>
                    <div class="clearfix"></div>
                    <div class="radio clip-radio radio-success radio-inline">
                        <input type="radio" id="radio3" {{($student->Medium == "urdu") ? "checked" : ""}} name="Medium" value="urdu">
                        <label for="radio3">
                            Urdu
                        </label>
                    </div>
                    <div class="radio clip-radio radio-success radio-inline">
                        <input type="radio" id="radio4" value="{{($student->Medium == "english") ? "checked" : ""}}" name="Medium" value="english">
                        <label for="radio4">
                            English
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">

                <div class=" form-group">
                    <label class="control-label">Roll No</label> <span class="symbol required" aria-required="true"></span>
                    <input id="roll_no" placeholder="Roll No" required="required" value="{{$student->Roll_No}}" name="Roll_No" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Registration ID</label> <span class="symbol required" aria-required="true"></span>
                    <input id="reg_ID" placeholder="Registration ID" required="required" value="{{$student->Registration_ID}}" name="Registration_ID" type="text" class="form-control " aria-required="true">
                </div>

                <div class=" form-group">
                    <label class="control-label">Religion</label> <span class="symbol required" aria-required="true"></span>
                    <input placeholder="Religion" required="required" value="{{$student['user']->Religion}}" name="Religion" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Admission Date</label> <span class="symbol required" aria-required="true"></span>
                    <input id="datepicker1" placeholder="Admission_Date" required="required" value="{{$student->Admission_Date}}" name="Joining_Date" type="date" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Address</label> <span class="symbol required" aria-required="true"></span>
                    <textarea class="form-control" rows="5" cols="50" name="Address">{{$student['user']->Address}}</textarea>
                </div>
                <div class=" form-group">
                    <label class="control-label">Student Image</label> <span class="symbol required" aria-required="true"></span>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file">
                                Browse… <input type="file" id="imgInp">
                            </span>
                        </span>
                        <input type="text" value="{{$student['user']->Image}}" name="Image" class="form-control" readonly>
                    </div>
                    <img id='img-upload' class="img-thumbnail" />
                </div>

            </div>
            <div class="clearfix"></div>
            <hr>
            <div class="submit-btn">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="pull-left">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                    <div class="pull-right">
                        <a type="button" href="{{route('student.index')}}" class="btn btn-default">Cancel</a>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <input type="hidden" name="_method" value="PATCH">
            {{csrf_field()}}
        </form>
    </div>
    <div class="clear40"></div>
@endsection

@section('js')

    <script>

        $(function () {

            var form = $('#staff_store');

            form.validate();
        })



    </script>

@endsection

