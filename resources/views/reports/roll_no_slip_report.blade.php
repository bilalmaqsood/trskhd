@extends('layouts.app')

@section('css')

@endsection

@section('title' , 'All-Students')

@section('content')

 <div class="heading_btns_area">
        <div class="container">
                <h2>Roll No Slip</h2>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="container">
        <div class="panel panel-primary">
          <div class="panel-heading">Filter</div>
          <div class="panel-body">
              <div class="col-sm-4">
              <div class="col-sm-4">
                   <select name="class" class="form-control">
                            <option value="class1">Class one</option>
                            <option value="class2">Class two</option>
                            <option value="class3">Class three</option>
                            <option value="class4">Class four</option>
                    </select>
              </div>
              <div class="clear30"></div>
              <div class="download-btn col-sm-12">
                  <a href="#" class="btn btn-primary">PDF</a>
              </div>
          </div>
        </div>
    </div>


@endsection

@section('js')

@endsection

@section('scripts')
    @include('partials._scripts', ['model' => 'student'])
    @include('partials._status', ['model' => 'student'])
@endsection