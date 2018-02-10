@extends('layouts.app')

@section('css')

@endsection

@section('title' , 'Edit-Test')

@section('content')

    <div class="">
        <div class="heading_btns_area">
            <h2 class="">Edit {{$test->Name}}</h2>
        </div>
        <div class="clear40"></div>
        <div class="create_test_area">
            <div class="col-md-6 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Edit Exam</div>
                    <div class="panel-body">
                        <form method="post" action="{{route('test.update' , [$test->id])}}" >
                            <div class="form-group">
                                <label>Exam Name</label>
                                <input type="text" value="{{$test->Name}}" name="Name" class="form-control"  placeholder="Exam Name">
                            </div>
                            <div class="form-group">
                                <label>Book</label>
                                <select class="form-control selectpicker" name="book_id">
                                    <option disabled selected>Select a book</option>
                                    @foreach($books as $book)
                                        <option {{($book->id == $test->book_id) ? "selected" : ""}} value="{{$book->id}}">{{$book->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select Class</label>
                                <select name="class_id" class="form-control selectpicker">

                                    <option selected="selected" disabled="disabled">Select Class</option>
                                    @foreach($classes as $class)
                                        <option {{($test->class_id == $class->id) ? "selected" : "" }} value="{{$class->id}}">{{$class->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select Teacher</label>
                                <select name="teacher_id" class="form-control selectpicker">
                                    <option selected="selected" disabled="disabled">Select Teacher</option>
                                    @foreach($teachers as $teacher)
                                        <option {{($test->teacher_id == $teacher->id) ? "selected" : ""  }} value="{{$teacher->id}}">{{$teacher['user']->First_Name . ' '. $teacher['user']->Last_Name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select Year</label>
                                <select name="Year" class="form-control selectpicker">
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Total Marks</label>
                                <input type="text" value="{{$test->Total_Marks}}" name="Total_Marks" class="form-control"  placeholder="Total Marks">
                            </div>
                            <div class="form-group">
                                <label>Passing Marks</label>
                                <input type="text" value="{{$test->Passing_Marks}}" name="Passing_Marks" class="form-control"  placeholder="Passing Marks">
                            </div>
                            <div class="form-group">
                                <label>Start Date</label>
                                <input id="datepicker" placeholder="Exam Start Date" required="required" value="{{$test->Start_Date}}" name="Start_Date" type="date" class="form-control " aria-required="true">
                            </div>
                            <div class="form-group">
                                <label>Start Time</label>
                                <input id="datepicker1"  required="required" value="{{$test->Start_Time}}" name="Start_Time" type="time" class="form-control " aria-required="true">
                            </div>
                            <div class="form-group">
                                <label>End Time</label>
                                <input id="datepicker1"  required="required" value="{{$test->End_Time}}" name="End_Time" type="time" class="form-control " aria-required="true">
                            </div>
                            {{csrf_field()}}
                            <button type="submit" value="" class="btn btn-success btn-wide">Update Test</button>
                            <a href="{{route('test.index')}}" class="btn btn-primary btn-wide test_toggle">Show All Tests</a>
                            <hr>
                            <input type="hidden" name="_method" value="PATCH">
                        </form>
                    </div>
                </div>
            </div>
        </div>
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

