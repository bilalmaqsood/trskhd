@extends('layouts.app')

@section('css')

@endsection

@section('title' , 'All-Students')

@section('content')

 <div class="heading_btns_area">
        <div>
                <h2>Fee Report</h2>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="">
        <div class="panel panel-primary">
          <div class="panel-heading">Filter</div>
          <div class="panel-body">
            <form action="{{ route('fee_slip') }}" method="post">
                {{ csrf_field() }}
              <div class="col-sm-4">
                  <select name="year" id="years" class="form-control">
                        <option value="0">Show All</option>
           @foreach($exams->first()->details as $detail)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                    </select>
              </div>
              <div class="col-sm-4">
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
              <div class="col-sm-4">
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
<script type="text/javascript">
   $(document).ready(function(){
        $('#years').on('change', function(e){
            var id_category = e.target.value;
            $.get('{{ url('news')}}/'+id_category, function(data){
                console.log(id_category);
                console.log(data);
                $('#news_data').empty();
                $.each(data, function(index, element){
                    $('#news_data').append("<tr><td>"+element.title+"</td><td>"+element.file+"</td>"+
                    "<td>"+element.content+"</td><td>"+element.like+"</td><td>"+element.view+"</td><td>"+find('.action')+"</td></tr>");
                });
            });
        });
    });
</script>
@endsection

@section('scripts')
    @include('partials._scripts', ['model' => 'student'])
    @include('partials._status', ['model' => 'student'])
@endsection