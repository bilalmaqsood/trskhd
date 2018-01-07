@extends('layouts.app')

@section('css')
@endsection
@section('title' , 'All-Exams')
@section('content')

    <div class="clear40"></div>
    <div class="heading_btns_area">
        <div class="container">
            <div class="pull-left">
                <h2>Exams</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('exam.create')}}" class="btn btn-primary">Create Exam</a>
            </div>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="container">
        @include('partials._exams')
    </div>

@endsection

@section('js')

    <script>

        $(function(){
            $('#example').DataTable({
                "sDom": 'Rfrtlip'
            });
        })

    </script>

@endsection

@section('scripts')
    @include('partials._scripts', ['model' => 'exam'])
@endsection