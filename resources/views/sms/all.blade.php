@extends('layouts.app')

@section('css')
@endsection

@section('title' , 'SMS-Details')

@section('content')

    <div class="clear40"></div>
    <div class="container">

        <div class="jumbotron">
            <h2 class="">All SMS</h2>
            <div class="pull-right">
                <a href="{{route('sms.create')}}" class="btn btn-primary">Add New</a>
            </div>
        </div>

        <div class="clear20"></div>
        <div class="view_std_area">
            <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Sender</th>
                        <th>Receiver</th>
                        <th>Text</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                @if(count($allSms) > 0)
                    @foreach($allSms as $sms)
                        <tr>
                            <td>{{$sms['user']->First_Name}}</td>
                            <td>{{$sms['user']->Last_Name}}</td>
                            <td>{{$sms['user']->Mobile}}</td>
                            <td>{{$sms->receiver}}</td>
                            <td>{{$sms->text}}</td>
                            <td>{{$sms->created_at}}</td>
                            <td>
                                <a class="delete" data-id="{{$sms['user']->id}}" href="javascript:void(0)" title="Delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
        </div>

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
    @include('partials._scripts', ['model' => 'sms'])
@endsection