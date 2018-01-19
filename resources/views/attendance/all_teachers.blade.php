@extends('layouts.app')

@section('css')
@endsection
@section('title' , 'All-Attendance')
@section('content')

    <div class="clear40"></div>
    <div class="heading_btns_area">
        <div class="container">
            <div class="pull-left">
                <h2>Attendance Details</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('teacher-attendance')}}" class="btn btn-primary">Add New</a>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="clear20"></div>
        <div class="view_std_area">
            <div class="std-filters">
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
                    <select name="class_name" class="form-control">
                        <option value="class1">Class one</option>
                        <option value="class2">Class two</option>
                        <option value="class3">Class three</option>
                        <option value="class4">Class four</option>
                    </select>
                </div>
            </div>

            <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone No</th>
                    {{--<th>Class NAme</th>--}}
                    <th>Status</th>
                    @if(Auth::user()->hasRole('admin'))
                        <th>Action</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($attendances as $attendance)
                    <td>{{ isset($attendance->teacher) ? $attendance->teacher->user->First_Name.' '.$attendance->teacher->user->Last_Name : ""}}</td>
                    <td>{{isset($attendance->teacher) ? $attendance->teacher->user->Mobile : ""}}</td>
{{--                    <td>{{$attendance['student']->studentClass->name}}</td>--}}
                    <td>{{ucfirst($attendance->status)}}</td>
                    @if(Auth::user()->hasRole('admin'))
                        <td>
                            <a href="{{route('attendance.edit' , [$attendance->id])}}" title="Edit"><i class="fa fa-pencil"></i> </a>
                            <a class="delete"  data-id="{{$attendance->id}}" href="javascript:void(0)" title="Delete" ><i class="fa fa-trash"></i> </a>
                        </td>
                        @endif
                        </tr>
                        @endforeach
                </tbody>
            </table>


        </div>
    </div>
    <div class="clear40"></div>

@endsection

@section('js')

    <script>

        $(document).ready(function() {
            $('#example').DataTable({
                "sDom": 'Rfrtlip'
            });
        } );

    </script>

@endsection

@section('scripts')
    @include('partials._scripts', ['model' => 'attendance'])
@endsection
