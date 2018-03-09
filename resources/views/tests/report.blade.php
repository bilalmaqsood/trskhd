@extends('layouts.app')

@section('css')
@endsection
@section('title', 'Report')

@section('content')

    <div class="clear40"></div>

    <div class="heading_btns_area">
        <div class="container">
            <h2>Exam Report</h2>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">Filter</div>
            <div class="panel-body">
                <form method="post" action="{{route('exam.report')}}">
                    <div class="col-sm-3">
                        <select name="year" class="form-control">
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select name="month" class="form-control">
                            @foreach($months as $month)
                                <option value="{{$month}}">{{$month}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select name="class" class="form-control">
                            <option selected="selected" disabled="disabled">Select class</option>
                            @foreach($classes as $class)
                                <option value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select name="type" class="form-control">
                            <option value="mid">Mid Term</option>
                            <option value="final">Final Term</option>

                        </select>
                    </div>
                </form>
                <div class="clear30"></div>
                <div class="download-btn col-sm-12">
                    <a href="#" class="btn btn-primary">PDF</a>
                </div>
            </div>
        </div>
    </div>

    <div class="clear40"></div>

@endsection

@section('js')

@endsection