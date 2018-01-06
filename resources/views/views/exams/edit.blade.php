@extends('layouts.app')

@section('css')

@endsection

@section('title' , 'Edit-Exam')

@section('content')

    <div class="clear40"></div>
    <div class="container">
        <div class="jumbotron">
            <h2 class="">{{$exam->Name}}</h2>
        </div>
        <form method="post" action="{{route('exam.update' , [$exam->id])}}" >

        <div class="create_test_area">
            <div class="col-md-6 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Edit Exam</div>
                    <div class="panel-body">
                            <div class="form-group">
                                <label>Exam Name</label>
                                <input type="text" value="{{$exam->Name}}" name="Name" class="form-control"  placeholder="Exam Name">
                            </div>
                            <div class="form-group">
                                <label>Exam Type</label>
                                <select name="Type" class="form-control">
                                    <option disabled selected>Select Exam Type</option>
                                    <option value="Mid Term">Mid Term</option>
                                    <option value="Final Term">Final Term</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select Class</label>
                                <select name="class_id" class="form-control">

                                    <option selected="selected" disabled="disabled">Select Class</option>
                                    @foreach($classes as $class)
                                        <option {{($exam->class_id == $class->id) ? "selected" : "" }} value="{{$class->id}}">{{$class->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select Year</label>
                                <select name="Year" class="form-control">
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Start Date</label>
                                <input id="datepicker" placeholder="Exam Start Date" required="required" value="{{$exam->Start_Date}}" name="Start_Date" type="date" class="form-control " aria-required="true">
                            </div>
                            <div class="form-group">
                                <label>End Date</label>
                                <input id="datepicker" placeholder="Exam Start Date" required="required" value="{{$exam->End_Date}}" name="Start_Date" type="date" class="form-control " aria-required="true">
                            </div>
                            {{csrf_field()}}
                            <hr>
                            <input type="hidden" name="_method" value="PATCH">
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-primary">
                        <div class="panel-heading">{{$class->name . " Books"}}</div>
                        <div class="panel-body">
                            <form method="POST" action="{{route('exam.store')}}">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Room No</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($exam->details as $detail)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><a href="javascript:void(0)">{{$detail->book->name}}</a></td>
                                            <td><input type="date"  value="{{$detail->Date}}" name="Details[{{$loop->index}}][Date]"></td>
                                            <td><input type="time" value="{{$detail->Start_Time}}" name="Details[{{$loop->index}}][Start_Time]"></td>
                                            <td><input type="time" value="{{$detail->End_Time}}" name="Details[{{$loop->index}}][End_Time]"></td>
                                            <td> <input type="text" value="{{$detail->Room}}" name="Details[{{$loop->index}}][Room]" > </td>
                                            <input type="hidden" value="{{$detail->book_id}}" name="Details[{{$loop->index}}][book_id]" >
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                <button type="submit" value="" class="btn btn-success">Update Exam</button>
                                <a href="{{route('exam.index')}}" class="btn btn-primary test_toggle">Show All Exams</a>
                                {{--{{csrf_field()}}--}}
                                {{--<button type="submit" class="btn btn-success">Save Result</button>--}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </form>

    </div>

    <div class="clear40"></div>
@endsection

@section('js')

    <script>

        $(function () {

            var form = $('#staff_store');

            form.validate();
        })



    </script>

@endsection

