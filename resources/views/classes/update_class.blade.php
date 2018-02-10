@extends('layouts.app')

@section('css')
@endsection
@section('title' , 'Update Class')
@section('content')

    <div class="clear40"></div>
    <div class="heading_btns_area">
        <div class="container">
            <h2>Update Class</h2>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="container">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Students</div>
                <div class="panel-body">
                    <form method="post" action="{{route('update-class')}}">


                        <select name="class_id" class="form-control">
                            @foreach($classes as $cls)
                                <option value="{{$cls->id}}">{{$cls->name}}</option>
                            @endforeach
                        </select>
                        <div class="clear10"></div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Student Name</th>
                                        <th>Gender</th>
                                        <th>Left</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)

                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$student->user->First_Name.' '. $student->user->Last_Name}}</td>
                                        <td>{{ucfirst($student->user->Gender)}}</td>
                                        <td>
                                            <input type="checkbox" style="display: none" checked name="students[{{$student->id}}]" value="1">
                                            <input type="checkbox" name="students[{{$student->id}}]" value="0">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                        {{csrf_field()}}
                        <button type="submit" class="btn btn-success">Update Class</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="clear40"></div>

@endsection

@section('js')



@endsection

@section('scripts')

@endsection