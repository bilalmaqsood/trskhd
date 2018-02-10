@extends('layouts.app')

@section('title' , 'Fee Slip')
@section('css')
<style type="text/css">
    @media print {

}
</style>
@endsection

@section('content')

   <!--       <div class="heading_btns_area">
            <h2 class="">Fee Slip</h2>
        </div>
    <div class="clear40"></div> -->
    <div class="print_page" id="printTable">
        <div class="text-center">
            <img src="{{asset('')}}/assets/images/{{isset($header->name)? $header->name : 'logo.png' }}" class="logo" alt="">
            <div class="clear20"></div>
            <h1 class="text-uppercase">Fee Slip</h1>
            <div class="hr_border_dotted"></div>
        </div>
        <div class="col-md-6">
            <div class="col-md-6">
                <p>Class:</p>
                <p>Student Name:</p>
            </div>
            <div class="col-md-6 text-right">
                <p><strong>{{$student->studentClass->name}}</strong> </p>
                <p><strong>{{$student['user']->First_Name." ".$student['user']->Last_Name}}</strong></p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-6">
                <p>Father Name:</p>
                <p>Date:</p>
            </div>
            <div class="col-md-6">
                <p><strong>{{$student['user']->Guardian}}</strong></p>
                <!-- <p><strong>{{\Carbon\Carbon::now()->toDateString()}}</strong></p> -->
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="hr_border_dotted"></div>
        <div class="fee_details">
            <table class="table">
                <thead>
                <tr>
                    <th>SR No</th>
                    <th>Particular</th>
                    <th class="text-right">Amount</th>
                </tr>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>School Fee</td>
                    <td class="text-right">{{$student->studentClass->fee}}</td>
                </tr>
                {{--<tr>
                    <td>3</td>
                    <td>Late Fee</td>
                    <td class="text-right">20</td>
                </tr>--}}
                <tr>
                    <td></td>
                    <td><strong> Total </strong></td>
                    <td class="text-right"><strong>{{$student->studentClass->fee}}</strong></td>
                </tr>
                </tbody>
                </thead>
            </table>
            <div class="hr_border_dotted"></div>
            <div class="clear40"></div>
            <div class="text-center">
                <button type="button" class="btn btn-info print_btn" onclick="javascript:window.print();">Print</button>
                <button type="button" class="btn btn-primary">Back</button>
            </div>
        </div>
    </div>
    <div class="clear40"></div>

@endsection

@section('js')
<script>
</script>
@endsection