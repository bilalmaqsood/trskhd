@extends('layouts.app')

@section('css')

@endsection

@section('title' , 'Reports')

@section('content')

 <div class="heading_btns_area">
        <h2>Report</h2>
    </div>
    <div class="clear40"></div>
    <div class="">
        <div class="panel panel-primary">
          <div class="panel-heading">Filter</div>
          <div class="panel-body">
            <form action="{{ route('reports.generate',['type' => $type]) }}" method="post">
                {{ csrf_field() }}
                <div class="col-sm-3">
                  <select name="year" id="years" class="form-control">
                        <option value='' selected disabled="">--Select Month--</option>
                      @foreach(range(2000,2099) as $y)
                          <option value="{{$y}}">{{$y}}</option>
                      @endforeach
                    </select>
              </div>
              <div class="col-sm-3">
                    <select id='type' name="type" class="form-control">
                    <option value='' selected disabled="">--Select Term--</option>
                    <option value='Mid Term'>Mid Term</option>
                    <option value='Final Term'>Final Term</option>
                    </select> 
              </div>
              <div class="col-sm-3">
                   <select id="" name="class_id" class="form-control">

                        <option selected="selected" disabled="disabled">Select Admission Section of Student.</option>
                        @foreach($classes as $class)
                            <option value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                    </select>
              </div>
              <div class="clear30"></div>
              <div class="download-btn col-sm-12">
                <button type="submit" class="btn btn-primary">PDF</button>
                  <!-- <a href="#" class="btn btn-primary" download="download">PDF</a> -->
              </div>
              </form>
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