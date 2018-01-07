@extends('layouts.app')

@section('css')
@endsection
@section('title', 'Creae Test')
@section('content')

    <div class="clear40"></div>
    <div class="heading_btns_area">
        <div class="container">
            <h2>Create Exam</h2>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="container">
        <div class="create_test_area">
            <div class="col-md-6 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Create Test</div>
                    <div class="panel-body">
                        <form method="post" action="{{route('test.store')}}">
                            <div class="form-group">
                                <label>Test Name</label>
                                <input type="text" name="Name" class="form-control" value="" placeholder="Test Name">
                            </div>
                            <div class="form-group">
                                <label>Book</label>
                                <select class="form-control" name="book_id">
                                    <option disabled selected>Select a book</option>
                                    @foreach($books as $book)
                                        <option value="{{$book->id}}">{{$book->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{--<div class="form-group">
                                <label>Exam Type</label>
                                <select name="Type" class="form-control">
                                    <option disabled selected>Select Exam Type</option>
                                    <option value="Mid Term">Mid Term</option>
                                    <option value="Final Term">Final Term</option>
                                </select>
                            </div>--}}
                            <div class="form-group">
                                <label>Select Class</label>
                                <select name="class_id" class="form-control">

                                    <option selected="selected" disabled="disabled">Select Class</option>
                                    @foreach($classes as $class)
                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select Teacher</label>
                                <select name="teacher_id" class="form-control">
                                    <option selected="selected" disabled="disabled">Select Teacher</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{$teacher->id}}">{{$teacher['user']->First_Name . ' '. $teacher['user']->Last_Name}}</option>
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
                                <label>Total Marks</label>
                                <input type="text" name="Total_Marks" class="form-control" value="" placeholder="Total Marks">
                            </div>
                            <div class="form-group">
                                <label>Passing Marks</label>
                                <input type="text" name="Passing_Marks" class="form-control" value="" placeholder="Passing Marks">
                            </div>
                            <div class="form-group">
                                <label>Start Date</label>
                                <input id="datepicker" placeholder="Exam Start Date" required="required" name="Start_Date" type="date" class="form-control " aria-required="true">
                            </div>
                            <div class="form-group">
                                <label>Start Time</label>
                                <input id="datepicker1"  required="required" name="Start_Time" type="time" class="form-control " aria-required="true">
                            </div>
                            <div class="form-group">
                                <label>End Time</label>
                                <input id="datepicker1"  required="required" name="End_Time" type="time" class="form-control " aria-required="true">
                            </div>
                            {{csrf_field()}}
                            <button type="submit" value="" class="btn btn-success">Create Test</button>
                            <a href="{{route('test.index')}}" class="btn btn-primary test_toggle">Show All Tests</a>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="clear40"></div>

@endsection

@section('js')

@endsection