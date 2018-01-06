@extends('layouts.app')

@section('css')
@endsection

@section('content')

    <div class="clear40"></div>
    <div class="container">
        <div class="jumbotron">
            <h2 class="">{{$exam->Name}}</h2>
        </div>
        <form method="post" action="{{route('exam.update' , [$exam->id])}}" >

            <div class="create_test_area">

                <div class="container">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-primary">
                            <div class="panel-heading">{{""}}</div>
                            <div class="panel-body">
                                <form method="POST" >
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Start Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Room No</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($exam->details as $detail)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td><a href="{{route('addNumbers',['exam' => $exam->id , 'book'=>$detail->book->id])}}">{{$detail->book->name}}</a></td>
                                                <td>{{$detail->Date}}</td>
                                                <td>{{$detail->Start_Time}}</td>
                                                <td>{{$detail->End_Time}}</td>
                                                <td> {{$detail->Room}} </td>
                                                <input type="hidden" value="{{$detail->book_id}}" name="Details[{{$loop->index}}][book_id]" >
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    <a href="{{route('exam.index')}}" class="btn btn-primary test_toggle">Show All Exams</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>

    </div>

    <div class="clear40"></div>

@endsection

@section('js')

@endsection()