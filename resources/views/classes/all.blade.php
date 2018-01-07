@extends('layouts.app')

@section('css')
@endsection
@section('title' , 'All-Classes')
@section('content')

    <div class="clear40"></div>
    <div class="heading_btns_area">
        <div class="container">
            <div class="pull-left">
                <h2>Classes</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('classes.create')}}" class="btn btn-primary">Create Class</a>
            </div>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="container">
        <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Fee</th>
                    <th>Books</th>
                    <th>Boys</th>
                    <th>Girls</th>
                    <th>Total Seats</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($classes as $class)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$class->name}}</td>
                        <td>{{$class->fee}}</td>
                        <td>{{count($class->books)}}</td>
                        <td>{{""}}</td>
                        <td>{{""}}</td>
                        <td>{{$class->seats}}</td>
                        <td>
                            <a href="{{route('classes.edit' , [$class->id])}}" title="Edit"><i class="fa fa-pencil"></i> </a>
                            <a href="javascript:void(0)" data-id="{{$class->id}}" class="delete" title="Delete"><i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
    @include('partials._scripts', ['model' => 'classes'])
@endsection