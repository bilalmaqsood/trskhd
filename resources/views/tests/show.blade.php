@extends('layouts.app')

@section('css')
@endsection

@section('content')

    <div class="heading_btns_area">
        <div class="container">
            <h2 class="pull-left">View Test Details</h2>
            <div class="pull-right">
                <a class="download btn margin-bottom-5 btn-wide btn-o btn-primary">
                    <i class="fa fa-download" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="container">
        <div class="col-md-6">
            <div class="std-details-area">
                {{--<img src="../assets/images/kashi.jpg" class="img-thumbnail center-block" align="std-img">--}}
                <hr>
                <h5 class="text-center">Test {{$test->Name}}</h5>
            </div>
        </div>

        @include('partials._test')

    </div>
    <div class="clear40"></div>

@endsection

@section('js')

@endsection