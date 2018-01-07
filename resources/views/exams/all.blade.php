@extends('layouts.app')

@section('css')
@endsection
@section('title' , 'All-Exams')
@section('content')

    <div class="clear40"></div>
    <div class="heading_btns_area">
        <div class="container">
            <div class="pull-left">
                <h2>Exams</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('exam.create')}}" class="btn btn-primary">Create Exam</a>
            </div>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="container">
        <div class="tests-filters">
            <div class="col-md-2">
                <select name="year" class="form-control">
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="month" class="form-control">
                    <option value="jan">January</option>
                    <option value="feb">February</option>
                    <option value="march">March</option>
                    <option value="apr">April</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="class" class="form-control">
                    <option value="class1">Class one</option>
                    <option value="class2">Class two</option>
                    <option value="class3">Class three</option>
                    <option value="class4">Class four</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="absent" class="form-control">
                    <option value="all">All</option>
                    <option value="absent">Absent</option>
                </select>
            </div>
        </div>
        @include('partials._exams')
    </div>

@endsection

@section('js')

    <script>

        $(function(){
            $('#example').DataTable({
                "sDom": 'Rfrtlip'
            });
        })

    </script>

@endsection

@section('scripts')
    @include('partials._scripts', ['model' => 'exam'])
@endsection