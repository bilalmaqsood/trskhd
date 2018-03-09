@extends('layouts.app')

@section('css')
@endsection
@section('title', 'Show Test')

@section('content')

    <div class="heading_btns_area">
        <div class="">
            <h2 class="pull-left">View Test</h2>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clear40"></div>
    <div class="">
        <div class="col-md-12">
            <div class="std-details-area">
                <h5 class="text-center text-uppercase">Test {{$test->Name}}</h5>
            </div>
        </div>
       <div class="clearfix"></div>

        @include('partials._test')

    </div>
    <div class="clear40"></div>

@endsection

@section('js')

@endsection