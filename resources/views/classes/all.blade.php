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
                @foreach($exams as $exam)
                    <tr>
                        <td>{{$exam['teacher']->user->First_Name ." ". $exam['teacher']->user->Last_Name}}</td>
                        <td>{{$exam->examclass->name}}</td>
                        <td>{{$exam->Type}}</td>
                        <td>{{$exam->Start_Date}}</td>
                        <td>{{$exam->Start_Time}}</td>
                        <td>{{$exam->End_Time}}</td>
                        <td>
                            <a href="exam_view_details.html" title="View"><i class="fa fa-eye"></i> </a>
                            <a href="{{route('exam.edit' , [$exam->id])}}" title="Edit"><i class="fa fa-pencil"></i> </a>
                            <a href="#" title="Download Exam"><i class="fa fa-download"></i> </a>
                            <a href="#" title="Download Roll No Slip"><i class="fa fa-cloud-download"></i> </a>
                            <a href="javascript:void(0)" data-id="{{$exam->id}}" class="delete" title="Delete"><i class="fa fa-trash"></i> </a>
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
    @include('partials._scripts', ['model' => 'exam'])
@endsection