@extends('layouts.app')

@section('css')
@endsection

@section('content')

    <div class="clear40"></div>

    <div class="heading_btns_area">
        <div class="container">
            <h2>{{$exam->Name}}</h2>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">{{$book->name}}</div>
                <div class="panel-body">
                    <form method="POST" action="{{route('storeNumbers' ,[$exam->id])}}">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Roll Number</th>
                                    <th>Student Name</th>
                                    <th>Type</th>
                                    <th>Add Numbers</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($exam['examclass']->students as $student)
                                    <tr>
                                        <td>{{$student->Roll_No}}</td>
                                        <td>{{$student->user->First_Name.' '.$student->user->Last_Name}}</td>
                                        <td>{{$exam->Type}}</td>
                                        <td><input required type="number" name="results[{{$loop->iteration}}][obtained_marks]"></td>
                                        <input type="hidden" name="results[{{$loop->iteration}}][student_id]" value="{{$student->id}}">
                                        <input type="hidden" name="results[{{$loop->iteration}}][book_id]" value="{{$book->id}}">
                                        <input type="hidden" name="results[{{$loop->iteration}}][class_id]" value="{{$class->id}}">
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

    <div class="clear40"></div>

@endsection

@section('js')

@endsection