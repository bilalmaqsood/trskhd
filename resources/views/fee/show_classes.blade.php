@extends('layouts.app')

@section('css')
@endsection

@section('content')

    <div class="heading_btns_area">
        <div class="">
            <h2>Add Fees</h2>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Fee Sheet</div>
                <div class="panel-body">
                    <form method="get" action="{{route('class_students')}}">
                        <div class="form-group">
                            <select name="class_id" class="form-control selectpicker">
                                <option selected disabled>Select Class</option>
                                @foreach($classes as $class)
                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success btn-wide">Show Student</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="clear40"></div>

@endsection

@section('js')

@endsection