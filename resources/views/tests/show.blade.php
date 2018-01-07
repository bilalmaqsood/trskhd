@extends('layouts.app')

@section('css')
@endsection

@section('content')

    <div class="heading_btns_area">
        <div class="container">
            <h2 class="pull-left">View Test Details</h2>
            <div class="pull-right">
                <a class="download btn margin-bottom-5 btn-wide btn-o btn-primary">
                    <i class="fa fa-download" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="container">
        <div class="col-md-6">
            <div class="std-details-area">
                {{--<img src="../assets/images/kashi.jpg" class="img-thumbnail center-block" align="std-img">--}}
                <hr>
                <h5 class="text-center">Test {{$test->Name}}</h5>
            </div>
        </div>
        <div class="col-md-6">
        </div>
        <div class="test_information">
            <hr>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    {{--<th>Name</th>--}}
                    <th>Class</th>
                    <th>Book</th>
                    <th>Total Marks</th>
                    <th>Passing Marks</th>
                    <th>Obtained Marks</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($test['details'] as $detail)
                        <tr>
{{--                            <td>{{$detail['student']->user->First_Name.' '.$detail['student']->user->Last_Name }}</td>--}}
                            <td>{{$test['examclass']->name}}</td>
                            <td>{{$test['book']->name}}</td>
                            <td>{{$test->Total_Marks}}</td>
                            <td>{{$test->Passing_Marks}}</td>
                            <td>{{$detail->marks}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="clear40"></div>

@endsection

@section('js')

@endsection