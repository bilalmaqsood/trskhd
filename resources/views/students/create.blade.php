@extends('layouts.app')

@section('css')

@endsection

@section('title' , 'Students')

@section('content')

    <div class="clear40"></div>
    <div class="container">
        <div class="jumbotron">
            <h2 class="">Students</h2>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{route('student.store')}}" id="staff_store" enctype="multipart/form-data">
            <div class="col-md-6">
                <div class=" form-group">
                    <label class="control-label">Select Class</label> <span class="symbol required" aria-required="true"></span>
                    <select id="" name="class_id" class="form-control">

                        <option selected="selected" disabled="disabled">Select Admission Section of Student.</option>
                        @foreach($classes as $class)
                            <option {{(old('class_id') == $class->id ? "selected" : "")}} value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class=" form-group">
                    <label class="control-label">First name</label> <span class="symbol required" aria-required="true"></span>
                    <input id="first_name" placeholder="First Name" required="required" name="First_Name" value="{{old('First_Name')}}" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Last name</label> <span class="symbol required" aria-required="true"></span>
                    <input id="last_name" placeholder="Last_Name" required="required" name="Last_Name" value="{{old('Last_Name')}}"  type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Date of Brith</label> <span class="symbol required" aria-required="true"></span>
                    <input id="datepicker" placeholder="DOB" required="required" name="DOB" value="{{old('DOB')}}" type="date" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Father / Husband</label> <span class="symbol required" aria-required="true"></span>
                    <input placeholder="Guardian's Name" required="required" name="Guardian" value="{{old('Guardian')}}" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">CNIC No</label> <span class="symbol required" aria-required="true"></span>
                    <input placeholder="CNIC No" required="required" name="CNIC" value="{{old('CNIC')}}" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Mobile No</label> <span class="symbol required" aria-required="true"></span>
                    <input placeholder="Phone No" required="required" name="Mobile" value="{{old('Mobile')}}" id="mobile" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Gender</label> <span class="symbol required" aria-required="true"></span>
                    <div class="clearfix"></div>
                    <div class="radio clip-radio radio-success radio-inline">
                        <input type="radio" id="radio1" name="Gender" value="male" @if(old('Gender') ==  "male") checked="checked" @endif>
                        <label for="radio1">
                            Male
                        </label>
                    </div>
                    <div class="radio clip-radio radio-success radio-inline">
                        <input type="radio" id="radio2" name="Gender" @if(old('Gender') ==  "female") checked="checked" @endif value="female">
                        <label for="radio2">
                            Female
                        </label>
                    </div>
                </div>
                <div class=" form-group">
                    <label class="control-label">Medium</label> <span class="symbol required" aria-required="true"></span>
                    <div class="clearfix"></div>
                    <div class="radio clip-radio radio-success radio-inline">
                        <input type="radio" id="radio3" @if(old('Medium') ==  "urdu")  checked="checked" @endif name="Medium"  value="urdu">
                        <label for="radio3">
                            Urdu
                        </label>
                    </div>
                    <div class="radio clip-radio radio-success radio-inline">
                        <input type="radio" id="radio4" name="Medium" @if(old('Medium') ==  "english")  checked="checked" @endif value="english">
                        <label for="radio4">
                            English
                        </label>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class=" form-group">
                    <label class="control-label">User Name</label> <span class="symbol required" aria-required="true"></span>
                    <input  placeholder="user name must be unique for each user" required="required" name="username" value="{{old('username')}}" type="text" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Roll No</label> <span class="symbol required" aria-required="true"></span>
                    <input id="roll_no" placeholder="Roll No" required="required" name="Roll_No" value="{{old('Roll_No')}}" type="text" class="form-control " aria-required="true">
                </div>
               {{-- <div class=" form-group">
                    <label class="control-label">Registration ID</label> <span class="symbol required" aria-required="true"></span>
                    <input id="reg_ID" placeholder="Registration ID" required="required" name="Registration_ID" value="{{old('Registration_ID')}}" type="text" class="form-control " aria-required="true">
                </div>--}}

                <div class=" form-group">
                    <label class="control-label">Religion</label> <span class="symbol required" aria-required="true"></span>
                    <input placeholder="Religion" required="required" name="Religion" value="{{old('Religion')}}" type="text" class="form-control " aria-required="true">
                </div>

                <div class=" form-group">
                    <label class="control-label">Admission Date</label> <span class="symbol required" aria-required="true"></span>
                    <input id="datepicker1" placeholder="Joining_Date" required="required" name="Admission_Date" value="{{old('Admission_Date')}}" type="date" class="form-control " aria-required="true">
                </div>
                <div class=" form-group">
                    <label class="control-label">Address</label> <span class="symbol required" aria-required="true"></span>
                    <textarea class="form-control" rows="5" cols="50" name="Address" >{{old('Address')}}</textarea>
                </div>
                <div class="imageupload ">
                    <div class="file-tab ">
                        <img src="" alt="Image preview" class="thumbnail" style="max-width: 250px; max-height: 250px">
                        <label class="btn btn-default btn-file">
                            <span>Browse</span>
                            <!-- The file is stored here. -->
                            <input type="file" name="Image" value="{{old('Image')}}">
                        </label>
                        <button type="button" class="btn btn-default" style="display: inline-block;">Remove</button>
                        {{--<button type="button"  class="btn btn-default">Remove</button>--}}
                    </div>
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


        var $imageupload = $('.imageupload');
        $imageupload.imageupload();
    </script>

@endsection

