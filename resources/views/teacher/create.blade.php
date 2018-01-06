@extends('layouts.app')

@section('css')

@endsection

@section('title' , 'Staff')

@section('content')

    <div class="clear40"></div>
    <div class="container">
        <div class="jumbotron">
            <h2 class="">Staff</h2>
        </div>
        <form method="post" action="{{route('staff.store')}}" id="staff_store" enctype="multipart/form-data">
            <div class="col-md-6">
                <div class=" form-group">
                    <label class="control-label">Select Class</label> <span class="symbol required" aria-required="true"></span>
                    <select id="" name="class_id" class="form-control">

                        <option selected="selected" disabled="disabled">Select Admission Section of Student.</option>
                        @foreach($classes as $class)
                            <option value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class=" form-group">
                    <label class="control-label">First name</label> <span class="symbol required" aria-required="true"></span>
                    <input id="first_name" placeholder="First Name" required="required" name="First_Name" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Last name</label> <span class="symbol required" aria-required="true"></span>
                    <input id="last_name" placeholder="Last_Name" required="required" name="Last_Name" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Date of Brith</label> <span class="symbol required" aria-required="true"></span>
                    <input id="datepicker" placeholder="DOB" required="required" name="DOB" type="date" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Father / Husband</label> <span class="symbol required" aria-required="true"></span>
                    <input placeholder="Guardian's Name" required="required" name="Guardian" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">CNIC No</label> <span class="symbol required" aria-required="true"></span>
                    <input placeholder="CNIC No" required="required" name="CNIC" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Mobile No</label> <span class="symbol required" aria-required="true"></span>
                    <input placeholder="Phone No" required="required" name="Mobile" id="mobile" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Gender</label> <span class="symbol required" aria-required="true"></span>
                    <div class="clearfix"></div>
                    <div class="radio clip-radio radio-success radio-inline">
                        <input type="radio" id="radio1" name="Gender" value="male">
                        <label for="radio1">
                            Male
                        </label>
                    </div>
                    <div class="radio clip-radio radio-success radio-inline">
                        <input type="radio" id="radio2" name="Gender" value="female">
                        <label for="radio2">
                            Female
                        </label>
                    </div>
                </div>
                <div class=" form-group">
                    <label class="control-label">Martial Status</label> <span class="symbol required" aria-required="true"></span>
                    <div class="clearfix"></div>
                    <div class="radio clip-radio radio-success radio-inline">
                        <input type="radio" id="radio3" name="Martial_Status" value="married">
                        <label for="radio3">
                            Married
                        </label>
                    </div>
                    <div class="radio clip-radio radio-success radio-inline">
                        <input type="radio" id="radio4" name="Martial_Status" value="single">
                        <label for="radio4">
                            Single
                        </label>
                    </div>
                </div>

            </div>
            <div class="col-md-6">

                <div class=" form-group">
                    <label class="control-label">Religion</label> <span class="symbol required" aria-required="true"></span>
                    <input placeholder="Religion" required="required" name="Religion" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Staff Designation</label> <span class="symbol required" aria-required="true"></span>
                    <input placeholder="Staff Designation" required="required" name="Designation" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Joining Date</label> <span class="symbol required" aria-required="true"></span>
                    <input id="datepicker1" placeholder="Joining_Date" required="required" name="Joining_Date" type="date" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Increment At</label> <span class="symbol required" aria-required="true"></span>
                    <select name="Increment_At" class="form-control">
                        <option value="jan">January</option>
                        <option value="feb">February</option>
                        <option value="march">March</option>
                        <option value="apr">April</option>
                    </select>
                </div>
                <div class=" form-group">
                    <div class="col-md-6">
                        <label class="control-label">Holidays Allow</label> <span class="symbol required" aria-required="true"></span>
                        <input placeholder="Holidays Allow" required="required" name="Allowed_Holidays" type="text" class="form-control " aria-required="true">
                    </div>
                    <div class="col-md-6">
                        <label class="control-label"> Increment %</label> <span class="symbol required" aria-required="true"></span>
                        <input placeholder=" Increment %" required="required" name="Increment" type="text" class="form-control " aria-required="true">
                    </div>
                </div>
                <div class=" form-group">
                    <label class="control-label">Salary</label> <span class="symbol required" aria-required="true"></span>
                    <input placeholder="Salary" required="required" name="Salary" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Address</label> <span class="symbol required" aria-required="true"></span>
                    <textarea class="form-control" rows="5" cols="50" name="Address"></textarea>
                </div>
                <div class=" form-group">
                    <label class="control-label">Student Image</label> <span class="symbol required" aria-required="true"></span>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file">
                                Browse… <input type="file" id="imgInp">
                            </span>
                        </span>
                        <input type="text" name="Image" class="form-control" readonly>
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
                        <button type="button" class="btn btn-default">Cancel</button>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
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

