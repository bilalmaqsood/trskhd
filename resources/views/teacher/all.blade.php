@extends('layouts.app')

@section('css')
@endsection

@section('title' , 'Teachers')

@section('content')

    <div class="clear40"></div>
    <div class="container">

        <div class="jumbotron">
            <h2 class="">All Teachers</h2>
            <div class="pull-right">
                <a href="{{route('teacher.create')}}" class="btn btn-primary">Add New</a>
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
                    <th>Phone No</th>
                    <th>Designation</th>
                    <th>CNIC NO</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @if(isset($teachers))
                        @foreach($teachers as $teacher)
                            <tr>
                                <td>{{$teacher['user']->First_Name }}</td>
                                <td>{{$teacher['user']->Last_Name}}</td>
                                <td>{{$teacher['user']->Mobile}}</td>
                                <td>{{$teacher->Designation}}</td>
                                <td>{{$teacher['user']->CNIC}}</td>
                                <td>
                                    <a href="{{route('teacher.show' , [$teacher->id])}}" title="View"><i class="fa fa-eye"></i> </a>
                                    <a href="{{route('teacher.edit' , [$teacher->id])}}" title="Edit"><i class="fa fa-pencil"></i> </a>
                                    <a class="status" data-id="{{$teacher['user']->id}}" href="javascript:void(0)" title="{{($teacher['user']->Activated) ? 'Un Lock' :  'Locked'}}">
                                        <i class="fa {{($teacher['user']->Activated) ? 'fa-unlock' :  'fa-lock'}} "></i>
                                    </a>
                                    <a href="{{route('view_salary_slip' , [$teacher->id])}}" title="Salary Slip">
                                        <i class="fa fa-link"></i>
                                    </a>
                                    <a class="delete" data-id="{{$teacher['user']->id}}" href="javascript:void(0)" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
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
    @include('partials._scripts', ['model' => 'teacher'])
    @include('partials._status', ['model' => 'teacher'])
@endsection