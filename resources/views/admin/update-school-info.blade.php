@extends('layouts.app')

@section('title', 'School Information')
@section('css')
@endsection

@section('content')

    <div class="clear40"></div>

    <div class="container">
        <form method="post" action="{{route('add_school_info')}}" enctype="multipart/form-data" class="form-horizontal">
            <div class="form-group">
                <label class="col-md-3 control-label">Owner Name <span class="symbol required" aria-required="true"></span></label>
                <div class="col-md-4 form-group">
                    <input type="text" name="owner" value="{{$school->owner}}" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">School Name <span class="symbol required" aria-required="true"></span></label>
                <div class="col-md-4 form-group">
                    <input type="text" name="name" value="{{$school->name}}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">City </label>
                <div class="col-md-4 form-group">
                    <input type="text" name="city" value="{{$school->city}}" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Address </label>
                <div class="col-md-4 form-group">
                    <textarea class="form-control" name="address">{{$school->address}}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Phone </label>
                <div class="col-md-4 form-group">
                    <input type="text" name="phone" value="{{$school->phone}}" class="form-control">
                </div>
            </div>
            <div class="imageupload ">
                <div class="file-tab ">
                    <img src="{{asset($school->image)}}"alt="Image preview" class="thumbnail" style="max-width: 250px; max-height: 250px">
                    <label class="btn btn-default btn-file">
                        <span>Browse</span>
                        <!-- The file is stored here. -->
                        <input type="file"  name="Image">
                    </label>
                    <button type="button" class="btn btn-default">Remove</button>
                </div>
            </div>

            <div class="clear40"></div>

            {{csrf_field()}}
            <div class="form-group">
                <div class="col-md-offset-4">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>

    <div class="clear40"></div>

@endsection

@section('js')

    <script>


    </script>

@endsection()