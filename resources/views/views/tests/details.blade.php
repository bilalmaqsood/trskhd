@extends('layouts.app')

@section('css')
@endsection

@section('content')

    <div class="heading_btns_area">
        <div class="container">
            <h2>Add {{$test->Name}} Marks</h2>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">{{$class->name}}</div>
                <div class="panel-body">
                    <form method="post" action="{{route('addTestMarks' ,[$test->id])}}">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>RegID</th>
                                <th>Book</th>
                                <th>Student Name</th>
                                <th>Gender</th>
                                <th>Absent</th>
                                <th>Fail</th>
                                <th>Obtained Marks</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($class['students'] as $student)
                                <tr>
                                    <td>{{$loop->iteration}}</td>

                                    <td>{{$student->Registration_ID}}</td>
                                    <td>{{$test->book->Name}}</td>
                                    <td>{{$student->user->First_Name.' '.$student->user->Last_Name }}</td>
                                    <td>{{$student->user->Gender}}</td>
                                    <input type="hidden" name="details[{{$loop->index}}][student_id]" value="{{$student->id}}" >
                                    <td> <input type="checkbox" name="details[{{$loop->index}}][attendance]" value="0"> </td>
                                    <td> <input type="checkbox" name="details[{{$loop->index}}][status]" value="fail"> </td>
                                    <td> <input type="number" name="details[{{$loop->index}}][marks]" value="" class="form-control" placeholder="Obtained Marks"> </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-success">Save Result</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection()