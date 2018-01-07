@extends('layouts.app')

@section('css')
@endsection
@section('title' , 'All-Attendance')
@section('content')

    <div class="clear40"></div>
    <div class="heading_btns_area">
        <div class="container">
            <div class="pull-left">
                <h2>Attendance Details</h2>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="clear20"></div>
        <div class="view_std_area">

            @include('partials._attendance')

        </div>
    </div>
    <div class="clear40"></div>

@endsection

@section('js')

    <script>

        $(document).ready(function() {
            $('#example').DataTable({
                "sDom": 'Rfrtlip'
            });
        } );

    </script>

@endsection

@section('scripts')
    @include('partials._scripts', ['model' => 'attendance'])
@endsection
