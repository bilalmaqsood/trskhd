@extends('layouts.app')

@section('css')
@endsection

@section('title' , 'All-Students')

@section('content')

    <div class="clear40"></div>
    <div class="container">

        <div class="jumbotron">
            <h2 class="">All Students</h2>
            <div class="pull-right">
                <a href="{{route('student.create')}}" class="btn btn-primary">Add New</a>
            </div>
        </div>

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
            </div>
            <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>User Name</th>
                    <th>Phone No</th>
                    <th>Class</th>
                    <th>CNIC NO</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($students as $student)
                        <tr>
                            <td>{{$student['user']->First_Name}}</td>
                            <td>{{$student['user']->Last_Name}}</td>
                            <td>{{$student['user']->username}}</td>
                            <td>{{$student['user']->Mobile}}</td>
                            <td>{{isset($student->classes->first()->name) ? $student->classes->first()->name : ""}}</td>
                            <td>{{$student['user']->CNIC}}</td>
                            <td>
                                <a href="{{route('student.show' , [$student->id])}}" title="View"><i class="fa fa-eye"></i> </a>
                                <a href="{{route('studentFeeSlip' , ['id'=>$student->id])}}" title="View"><i class="fa fa-file" aria-hidden="true"></i> </a>
                                <a href="{{route('student.result' , ['id' => $student->id])}}" title="View"><i class="fa fa-ambulance"></i> </a>
                                <a href="{{route('student.edit' , [$student->id])}}" title="Edit"><i class="fa fa-pencil"></i> </a>
                                <a class="status" data-id="{{$student['user']->id}}" href="javascript:void(0)"  title="{{($student['user']->Activated) ? 'Un Lock' :  'Locked'}}">
                                    <i class="fa {{($student['user']->Activated) ? 'fa-unlock' :  'fa-lock'}} "></i>
                                </a>
                                <a href="{{route('studentSlip' , [$student->id])}}" title="Roll Number Slip">
                                    <i class="fa fa-link"></i>
                                </a>
                                <a class="delete" data-id="{{$student['user']->id}}" href="javascript:void(0)" title="Delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

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
    @include('partials._scripts', ['model' => 'student'])
    @include('partials._status', ['model' => 'student'])
@endsection