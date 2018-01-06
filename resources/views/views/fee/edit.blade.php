@extends('layouts.app')

@section('css')
@endsection

@section('content')

    <div class="clear40"></div>
    <div class="heading_btns_area">
        <div class="container">
            <h2>Edit Fees</h2>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="container">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Fee Sheet</div>
                <div class="panel-body">
                    <form method="post" action="{{route('edit_fee', [$fee->id])}}">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Gender</th>
                                <th>Class</th>
                                <th>Status</th>
                                <th>Add Fee</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$fee->student->user->First_Name.' '. $fee->student->user->Last_Name}}</td>
                                    <td>{{ucfirst($fee->student->user->Gender)}}</td>
                                    <td>{{$fee->class->name}}</td>
                                    <td>{{ucfirst($fee->status)}}</td>
                                    <td>
                                        <input type="checkbox" name="status" value="paid">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-success">Update Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="clear40"></div>

@endsection

@section('js')

@endsection