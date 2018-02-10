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
                <p>Due Date:</p>
            </div>
            <div class="col-md-6">
                <p><strong>{{$student['user']->Guardian}}</strong></p>
                <p><strong>{{config('app.fee_due_date')}} {{\Carbon\Carbon::now()->format('F')}}</strong></p>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="hr_border_dotted"></div>
        <div class="fee_details">
            <table class="table">
                <thead>
                <tr>
                    <th>SR No</th>
                    <th>Month</th>
                    <th>Particular</th>
                    <th class="text-right">Amount</th>
                </tr>
                <tbody>
                @foreach($fees as $fee)
                <tr>
                    <td>{{$fee->id}}</td>
                    <td>{{months($fee->month)}}</td>
                    <td>School Fee</td>
                    <td class="text-right">{{$student->studentClass->fee}}</td>
                </tr>
                @endforeach

                <tr>
                    <td></td>
                    <td></td>
                    <td class="text-right"><strong> Total </strong></td>
                    <td class="text-right"><strong>{{totalFee($fees,$student->studentClass->fee)}}</strong></td>
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