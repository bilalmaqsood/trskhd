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
                        <option value="2017">2014</option>
                        <option value="2017">2015</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2020">2021</option>
                        <option value="2020">2022</option>
                        <option value="2020">2023</option>
                        <option value="2020">2024</option>
                        <option value="2020">2025</option>
                        <option value="2020">2026</option>
                        <option value="2020">2027</option>
                        <option value="2020">2028</option>
                        <option value="2020">2029</option>
                        <option value="2020">2030</option>
                    </select>
              </div>
              <div class="col-sm-3">
                    <select id='months' name="month" class="form-control">
                    <option value='' selected disabled="">--Select Month--</option>
                    <option value='1'>Janaury</option>
                    <option value='2'>February</option>
                    <option value='3'>March</option>
                    <option value='4'>April</option>
                    <option value='5'>May</option>
                    <option value='6'>June</option>
                    <option value='7'>July</option>
                    <option value='8'>August</option>
                    <option value='9'>September</option>
                    <option value='10'>October</option>
                    <option value='11'>November</option>
                    <option value='12'>December</option>
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