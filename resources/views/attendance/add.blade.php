@extends('layouts.app')

@section('css')
@endsection
@section('title' , 'All-Fees')
@section('content')

    <div class="clear40"></div>
    <div class="heading_btns_area">
        <div class="container">
            <h2>Add Attendance Details</h2>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="container">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Attendance Sheet</div>
                <div class="panel-body">
                    <form method="post" action="{{route('add_attendance')}}">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Student Name</th>
                                <th>Gender</th>
                                <th>Class</th>
                                <th>Absent</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($class->students as $student)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$student->user->First_Name.' '. $student->user->Last_Name}}</td>
                                        <td>{{ucfirst($student->user->Gender)}}</td>
                                        <td>{{$class->name}}</td>
                                        <td>
                                            <input type="checkbox" style="display: none" checked name="students[{{$student->id}}]" value="present">
                                            <input type="checkbox" name="students[{{$student->id}}]" value="absent">
                                        </td>
                                    </tr>
                                @endforeach
                              </tbody>
                        </table>
                        <input type="hidden" name="class_id" value="{{$class->id}}">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-success">Add Attendance</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="clear40"></div>

@endsection

@section('js')



@endsection

@section('scripts')

@endsection