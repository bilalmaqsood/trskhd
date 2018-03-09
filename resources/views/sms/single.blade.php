@extends('layouts.app')

@section('css')
@endsection
@section('title' , 'Single SMS')
@section('content')

    <div class="clear40"></div>
    <div class="heading_btns_area">
        <div class="container">
            <h2>One Student SMS</h2>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="container">
        <div class="one_std_sms_area">
            <form method="post" action="{{route('single.sms')}}">
                <div class="form-group">
                    <input type="text" name="number" value="" class="form-control" placeholder="Enter Phone Number">
                </div>
                <div class="form-group">
                    <textarea name="message" cols="20" rows="13" class="form-control" placeholder="Message"></textarea>
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