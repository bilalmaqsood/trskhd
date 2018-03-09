@extends('layouts.app')

@section('css')
<style type="text/css">


</style>
@endsection
@section('title','Salary Slip')
@section('content')

    <div class="heading_btns_area">
            <h2 class="pull-left">Salary Slip</h2>
            <div class="pull-right">
                <a href="{{route('download_salary_slip' , [$teacher->id])}}" class="download btn margin-bottom-5 btn-wide btn-o btn-primary">
                    <i class="fa fa-download fa-lg" aria-hidden="true"></i>
                </a>
            </div>
            <div class="clearfix">
        </div>
    </div>
    <div class="clear40"></div>
    <div class="salary_slip_area">
        <div class="text-center">
            <img src="{{asset('')}}/assets/images/{{isset($header->name)? $header->name : 'logo.png' }}" class="logo" alt="">
        </div>
        <div class="clear20"></div>
        <div class="salary_slip_details">
            <div class="col-md-3">
                <p>Name</p>
            </div>
            <div class="col-md-9">
                <p><strong>{{$teacher['user']->First_Name . " " . $teacher['user']->Last_Name}}</strong></p>
            </div>
            <div class="col-md-3">
                <p>Designation</p>
            </div>
            <div class="col-md-9">
                <p><strong>{{$teacher->Designation}}</strong></p>
            </div>
            <div class="col-md-3">
                <p>Date</p>
            </div>
            <div class="col-md-9">
                <p><strong>{{$date}}</strong></p>
            </div>
            <div class="clearfix"></div>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Earning</th>
                    <th> </th>
                    <th>Deductions</th>
                    <th> </th>
                </tr>
                <tbody>
                <tr>
                    <td>Basic Salary</td>
                    <td>{{$teacher->Salary}}</td>
                    <td>Leaves ({{$teacher->Leaves}})</td>
                    <td>{{$teacher->LeavesFine}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><strong>Net Salary</strong></td>
                    <td>{{$teacher->netSalary}}</td>
                </tr>
                </tbody>
                </thead>
            </table>
            <div class="clearfix"></div>
            <div class="sign_area">
                <div class="col-md-6">
                    <p><strong>Signature of Employee</strong>  _________________________________</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Signature of Dirctor</strong>  __________________________________</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="clear40"></div>

@endsection

@section('js')

@endsection