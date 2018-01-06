@extends('layouts.app')

@section('css')
@endsection

@section('title' , 'Roll-No-Slip')
@section('content')

    <div class="clear40"></div>

    <div class="heading_btns_area">
        <div class="container">
            <h2 class="pull-left">Roll No Slip</h2>
            <div class="pull-right">
                <a href="{{route('student.downloadSlip' , [$student->id])}}" class="download btn margin-bottom-5 btn-wide btn-o btn-primary">
                    <i class="fa fa-download" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>

    @include('partials._slip_details')

@endsection

@section('js')

@endsection