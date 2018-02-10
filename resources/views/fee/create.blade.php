@extends('layouts.app')

@section('css')
@endsection

@section('content')

    <div class="heading_btns_area">
        <div class="">
            <h2>Add Fees</h2>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Fee Sheet</div>
                <div class="panel-body">
                    <form method="post" action="add_fee_details.html">
                        <div class="form-group">
                            <select class="form-control selectpicker">
                                <option selected disabled>Select Class</option>
                                @foreach($classes as $class)
                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Show Student</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="clear40"></div>

@endsection

@section('js')

@endsection