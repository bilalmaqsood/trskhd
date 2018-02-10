@extends('layouts.app')

@section('css')
@endsection
@section('title' , 'All-Fees')
@section('content')

    <div class="clear40"></div>
    <div class="heading_btns_area">
        <div class="container">
            <h2>Add Attendance</h2>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="container">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Attendance Sheet</div>
                <div class="panel-body">
                    <form method="get" action="{{route('attendance_class_students')}}">
                        <div class="form-group">
                            <select name="class_id"  class="form-control selectpicker">
                                <option selected disabled="disabled">Please select a class</option>
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

    <script>

        $(document).ready(function() {
            $('#example').DataTable({
                "sDom": 'Rfrtlip'
            });
        } );

    </script>

@endsection

@section('scripts')
    @include('partials._scripts', ['model' => 'exam'])
@endsection