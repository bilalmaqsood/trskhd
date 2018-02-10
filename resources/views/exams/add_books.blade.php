@extends('layouts.app')

@section('css')
@endsection

@section('content')


    <div class="heading_btns_area">
        <div class="">
            <h2>Add {{$examData['Name']}} Details</h2>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="">
        <div class="col-md-12 ">
            <div class="panel panel-primary">
                <div class="panel-heading">{{$class->name . " Books"}}</div>
                <div class="panel-body table-responsive">
                    <form method="POST" action="{{route('exam.store')}}">
                        <table class="table table-striped table-bordered text-nowrap">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Total Marks</th>
                                <th>Passing Marks</th>
                                <th>Room No</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($class->books as $book)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td><a href="javascript:void(0)">{{$book->name}}</a></td>
                                        <td><input  required type="date" name="Details[{{$loop->index}}][Date]"></td>
                                        <td><input  required type="time" name="Details[{{$loop->index}}][Start_Time]"></td>
                                        <td><input  required type="time" name="Details[{{$loop->index}}][End_Time]"></td>
                                        <td><input  required type="number" name="Details[{{$loop->index}}][Total_Marks]"></td>
                                        <td><input  required type="number" name="Details[{{$loop->index}}][Passing_Marks]"></td>
                                        <td> <input   type="text" name="Details[{{$loop->index}}][Room]" > </td>
                                        <input  type="hidden" name="Details[{{$loop->index}}][book_id]" value="{{$book->id}}">
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