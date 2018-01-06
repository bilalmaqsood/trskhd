@extends('layouts.app')

@section('css')
@endsection
@section('title' , 'All-Tests')
@section('content')

    <div class="clear40"></div>
    <div class="heading_btns_area">
        <div class="container">
            <div class="pull-left">
                <h2>Tests All</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('test.create')}}" class="btn btn-primary">Create Test</a>
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
        <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Teacher</th>
                    <th>Class</th>
                    <th>Exam Title</th>
                    <th>Start Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tests as $test)
                    <tr>
                        <td>{{$test['teacher']->user->First_Name ." ". $test['teacher']->user->Last_Name}}</td>
                        <td>{{$test->examclass->name}}</td>
                        <td>{{$test->Type}}</td>
                        <td>{{$test->Start_Date}}</td>
                        <td>{{$test->Start_Time}}</td>
                        <td>{{$test->End_Time}}</td>
                        <td>
                            <a href="{{route('testDetails' , [$test->id])}}" title="View"><i class="fa fa-eye"></i> </a>
                            <a href="{{route('test.edit' , [$test->id])}}" title="Edit"><i class="fa fa-pencil"></i> </a>
                            <a href="#" title="Download Exam"><i class="fa fa-download"></i> </a>
                            <a href="{{route('test.show' , [$test->id])}}" title="View Test "><i class="fa fa-cloud-download"></i> </a>
                            <a href="javascript:void(0)" data-id="{{$test->id}}" class="delete" title="Delete"><i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
    @include('partials._scripts', ['model' => 'test'])
@endsection