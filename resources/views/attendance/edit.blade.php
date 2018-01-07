@extends('layouts.app')

@section('css')
@endsection
@section('title' , 'Edi-Attendance')
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
                    <form method="post" action="{{route('attendance.update', [$attendance->id])}}">
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
                            <tr>
                                <td>1</td>
                                <td>{{$attendance->student->user->First_Name.' '. $attendance->student->user->Last_Name}}</td>
                                <td>{{ucfirst($attendance->student->user->Gender)}}</td>
                                <td>{{$attendance['student']->studentClass->name}}</td>
                                <td>
                                    <input type="checkbox" style="display: none" checked name="status" value="present">
                                    <input type="checkbox" name="status" value="absent">
                                </td>
                            </tr>
                              </tbody>
                        </table>
                        <input type="hidden" name="class_id" value="{{$attendance['student']->studentClass->id}}">
                        <input type="hidden" name="student_id" value="{{$attendance['student']->id}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="PATCH">
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