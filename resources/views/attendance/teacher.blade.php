@extends('layouts.app')

@section('css')
@endsection
@section('title' , 'All-Teachers')
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
                    <form method="post" action="{{route('add-teacher-attendance')}}">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Teacher Name</th>
                                <th>Gender</th>
                                <th>Absent</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($teachers as $teacher)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$teacher->user->First_Name.' '. $teacher->user->Last_Name}}</td>
                                        <td>{{ucfirst($teacher->user->Gender)}}</td>
                                        <td>
                                            <input type="checkbox" style="display: none" checked name="teachers[{{$teacher->id}}]" value="present">
                                            <input type="checkbox" name="teachers[{{$teacher->id}}]" value="absent">
                                        </td>
                                    </tr>
                                @endforeach
                              </tbody>
                        </table>
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