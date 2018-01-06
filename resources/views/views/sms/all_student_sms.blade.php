@extends('layouts.app')

@section('css')
@endsection
@section('title' , 'SMS')
@section('content')

    <div class="clear40"></div>
    <div class="heading_btns_area">
        <div class="container">
            <h2>All Students SMS</h2>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="container">
        <div class="one_std_sms_area">
            <form method="post" action="{{route('students.all')}}">
                <div class="form-group">
                    <textarea name="message" cols="21" rows="14" class="form-control" placeholder="Message"></textarea>
                </div>
                {{csrf_field()}}
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Send SMS</button>
                </div>
            </form>
        </div>
    </div>
    <div class="clear40"></div>

@endsection

@section('js')

@endsection