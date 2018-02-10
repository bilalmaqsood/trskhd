<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Salary Slip</title>
</head>
<body>

<div class="clear40"></div>
<div class="heading_btns_area">
    <div class="container">
        <h2 class="pull-left">Salary Slip</h2>
        <div class="pull-right">
            <a href="{{route('download_salary_slip' , [$teacher->id])}}" class="download btn margin-bottom-5 btn-wide btn-o btn-primary">
                <i class="fa fa-download" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>
<div class="clear40"></div>
<div class="container salary_slip_area">
    <div class="text-center">
        <img src="{{asset('')}}/assets/images/logo.png" class="logo" alt="">
        <h1 class="text-uppercase">Salary Slip</h1>
    </div>
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
            <p><strong>12-12-2017</strong></p>
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
                <td>Provident Fund</td>
                <td>250</td>
            </tr>
            <tr>
                <td>HRA</td>
                <td>2000</td>
                <td>E.S.I</td>
                <td>250</td>
            </tr>
            <tr>
                <td></td>
                <td>12000</td>
                <td>Loan</td>
                <td>250</td>
            </tr>
            <tr>
                <td>Basic Salary</td>
                <td>12000</td>
                <td>Professional Tax</td>
                <td>250</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><strong>Net Salary</strong></td>
                <td>11000</td>
            </tr>
            </tbody>
            </thead>
        </table>
        <div class="clearfix"></div>
        <div class="sign_area">
            <div class="col-md-6">
                <p><strong>Signature of Employee</strong>  _____________________________________</p>
            </div>
            <div class="col-md-6">
                <p><strong>Signature of Dirctor</strong>  _____________________________________</p>
            </div>
        </div>
    </div>
</div>
<div class="clear40"></div>


</body>
</html>

