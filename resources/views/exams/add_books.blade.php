@extends('layouts.app')

@section('css')
@endsection

@section('content')

    <div class="clear40"></div>

    <div class="heading_btns_area">
        <div class="container">
            <h2>Add {{$examData['Name']}} Details</h2>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">{{$class->name . " Books"}}</div>
                <div class="panel-body">
                    <form method="POST" action="{{route('exam.store')}}">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Room No</th>

                            </tr>
                            </thead>
                            <tbody>
                                @foreach($class->books as $book)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td><a href="javascript:void(0)">{{$book->name}}</a></td>
                                        <td><input type="date" name="Details[{{$loop->index}}][Date]"></td>
                                        <td><input type="time" name="Details[{{$loop->index}}][Start_Time]"></td>
                                        <td><input type="time" name="Details[{{$loop->index}}][End_Time]"></td>
                                        <td> <input type="text" name="Details[{{$loop->index}}][Room]" > </td>
                                        <input type="hidden" name="Details[{{$loop->index}}][book_id]" value="{{$book->id}}">
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-success">Create Exam</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="clear40"></div>

@endsection

@section('js')

@endsection