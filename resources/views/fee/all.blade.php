@extends('layouts.app')

@section('css')
@endsection
@section('title' , 'All-Fees')
@section('content')

    <div class="clear40"></div>
    <div class="heading_btns_area">
        <div class="container">
            <div class="pull-left">
                <h2>Student Fees</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('show_classes')}}" class="btn btn-primary">Add New</a>
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone No</th>
                    <th>Class NAme</th>
                    <th>Fee</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($fees as $fee)
                        <tr>
                            <td>{{ isset($fee->student) ? $fee->student->user->First_Name : ""}}</td>
                            <td>{{isset($fee->student) ? $fee->student->user->Last_Name : ""}}</td>
                            <td>{{isset($fee->student) ? $fee->student->user->Mobile : ""}}</td>
                            <td>{{isset($fee->student) ? ucfirst($fee->student->classes->first()->name) :""}}</td>
                            <td>{{ucfirst($fee->status)}}</td>
                            <td>
                                {{--<a href="#" title="View"><i class="fa fa-eye"></i> </a>--}}
                                <a href="{{route('fee.edit' , [$fee->id])}}" title="Edit"><i class="fa fa-pencil"></i> </a>
                                <a href="{{route('delete_fee', [$fee->id])}}" title="Delete"><i class="fa fa-trash"></i> </a>
                            </td>
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
    @include('partials._scripts', ['model' => 'exam'])
@endsection