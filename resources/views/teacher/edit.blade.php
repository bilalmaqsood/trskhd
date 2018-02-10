@extends('layouts.app')

@section('css')

@endsection

@section('title' , 'Edit-Teacher')

@section('content')

    <div class="">
        <div class="heading_btns_area">
            <h2 class="">Edit Teacher</h2>
        </div>
    <div class="clear40"></div>
        <form method="post" action="{{route('teacher.update' , [$teacher->id])}}"  enctype="multipart/form-data">
            <div class="col-md-6">
                <div class=" form-group">
                    <label class="control-label">Select Class</label> <span class="symbol required" aria-required="true"></span>
                    <select id=""  name="class_id" class="form-control selectpicker">

                        <option selected="selected" disabled="disabled">Select Admission Section of Student.</option>
                        @foreach($classes as $class)
                            <option {{($teacher->class_id == $class->id) ? "selected" : ""}} value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class=" form-group">
                    <label class="control-label">First name</label> <span class="symbol required" aria-required="true"></span>
                    <input id="first_name" placeholder="First Name" required="required" value="{{$teacher['user']->First_Name}}"  name="First_Name" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Last name</label> <span class="symbol required" aria-required="true"></span>
                    <input id="last_name" placeholder="Last_Name" required="required" value="{{$teacher['user']->Last_Name}}" name="Last_Name" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Date of Brith</label> <span class="symbol required" aria-required="true"></span>
                    <input id="datepicker" placeholder="DOB" required="required" value="{{$teacher['user']->DOB}}" name="DOB" type="date" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Father / Husband</label> <span class="symbol required" aria-required="true"></span>
                    <input placeholder="Guardian's Name" required="required" value="{{$teacher['user']->Guardian}}" name="Guardian" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">CNIC No</label> <span class="symbol required" aria-required="true"></span>
                    <input placeholder="CNIC No" required="required" value="{{$teacher['user']->CNIC}}" name="CNIC" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Mobile No</label> <span class="symbol required" aria-required="true"></span>
                    <input placeholder="Phone No" required="required" value="{{$teacher['user']->Mobile}}" name="Mobile" id="mobile" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Personal No</label> <span class="symbol required" aria-required="true"></span>
                    <input placeholder="Phone No"  value="{{old('Personal')}}" name="Personal" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Gender</label> <span class="symbol required" aria-required="true"></span>
                    <div class="clearfix"></div>
                    <div class="radio clip-radio radio-success radio-inline">
                        <input type="radio" id="radio1" {{($teacher['user']->Gender == "male" ? "checked=checked" : "")}} name="Gender" value="male">
                        <label for="radio1">
                            Male
                        </label>
                    </div>
                    <div class="radio clip-radio radio-success radio-inline">
                        <input type="radio" id="radio2" {{($teacher['user']->Gender  == "female" ? "checked" : "")}} name="Gender" value="female">
                        <label for="radio2">
                            Female
                        </label>
                    </div>
                </div>
                <div class=" form-group">
                    <label class="control-label">Martial Status</label> <span class="symbol required" aria-required="true"></span>
                    <div class="clearfix"></div>
                    <div class="radio clip-radio radio-success radio-inline">
                        <input type="radio" id="radio3" {{($teacher['user']->Martial_Status == "married") ? "checked" : ""}} name="Martial_Status" value="married">
                        <label for="radio3">
                            Married
                        </label>
                    </div>
                    <div class="radio clip-radio radio-success radio-inline">
                        <input type="radio" id="radio4" {{($teacher['user']->Martial_Status == "single") ? "checked" : ""}} name="Martial_Status" value="single">
                        <label for="radio4">
                            Single
                        </label>
                    </div>
                </div>

            </div>
            <div class="col-md-6">

                <div class=" form-group">
                    <label class="control-label">Religion</label> <span class="symbol required" aria-required="true"></span>
                    <input placeholder="Religion" required="required" value="{{$teacher['user']->Religion}}" name="Religion" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Staff Designation</label> <span class="symbol required" aria-required="true"></span>
                    <input placeholder="Staff Designation" required="required" value="{{$teacher->Designation}}" name="Designation" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Joining Date</label> <span class="symbol required" aria-required="true"></span>
                    <input id="datepicker1" placeholder="Joining_Date" required="required" value="{{$teacher->Joining_Date}}" name="Joining_Date" type="date" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Increment At</label> <span class="symbol required" aria-required="true"></span>
                    <select value="{{old('Increment_At')}}" name="Increment_At" class="form-control selectpicker">
                        <option disabled selected>Please select month</option>
                        @foreach($months as $month)
                            <option {{(strtolower(old('Increment_At')) == strtolower($month) ? "selected" : "")}} value="{{$month}}">{{$month}}</option>
                        @endforeach
                    </select>
                </div>
                <div class=" form-group">
                    <div class="col-md-6 remove-padding-left">
                        <label class="control-label">Holidays Allow</label> <span class="symbol required" aria-required="true"></span>
                        <input placeholder="Holidays Allow" required="required" value="{{$teacher->Allowed_Holidays}}" name="Allowed_Holidays" type="text" class="form-control " aria-required="true">
                    </div>
                    <div class="col-md-6 remove-padding-right">
                        <label class="control-label"> Increment %</label> <span class="symbol required" aria-required="true"></span>
                        <input placeholder=" Increment %" required="required" value="{{$teacher->Increment}}" name="Increment" type="text" class="form-control " aria-required="true">
                    </div>
                </div>
                <div class=" form-group">
                    <label class="control-label">Salary</label> <span class="symbol required" aria-required="true"></span>
                    <input placeholder="Salary" required="required" value="{{$teacher->Salary}}" name="Salary" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Address</label> <span class="symbol required" aria-required="true"></span>
                    <textarea class="form-control" rows="5" cols="50" name="Address">{{$teacher['user']->Address}}</textarea>
                </div>
                <div class="imageupload ">
                    <div class="file-tab ">
                        <img src="{{asset($teacher['user']->Image)}}"alt="Image preview" class="thumbnail" style="max-width: 250px; max-height: 250px">
                        <label class="btn btn-default btn-file">
                            <span>Browse</span>
                            <!-- The file is stored here. -->
                            <input type="file"  name="Image">
                        </label>
                        <button type="button" class="btn btn-default">Remove</button>
                    </div>
                </div>
                <div class="clear10"></div>
                <!-- <div class="imageupload ">
                    <div class="file-tab ">
                        <img src="{{asset($teacher['user']->Card_Image)}}" alt="Image preview" class="thumbnail" style="max-width: 250px; max-height: 250px">
                        <label class="btn btn-default btn-file">
                            <span>Card Image</span>
                            <input type="file" name="Card_Image" >
                        </label>
                        <button type="button" class="btn btn-default" style="display: inline-block;">Remove</button>
                        {{--<button type="button"  class="btn btn-default">Remove</button>--}}
                    </div>
                </div> -->
            </div>
            <div class="clearfix"></div>
            <hr>
            <div class="submit-btn">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="pull-left">
                        <button type="submit" class="btn btn-primary btn-wide">Update</button>
                    </div>
                    <div class="pull-right">
                        <button type="button" class="btn btn-default btn-wide">Cancel</button>
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

