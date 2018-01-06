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
        <div class="create_test_area">
            <div class="col-md-6 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Edit Exam</div>
                    <div class="panel-body">
                        <form method="post" action="{{route('exam.update' , [$exam->id])}}" >
                            <div class="form-group">
                                <label>Exam Name</label>
                                <input type="text" value="{{$exam->Name}}" name="Name" class="form-control"  placeholder="Exam Name">
                            </div>
                            <div class="form-group">
                                <label>Book</label>
                                <input type="text" value="{{$exam->Book}}" name="Book" class="form-control" placeholder="Book Name">
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
                                <label>Select Teacher</label>
                                <select name="teacher_id" class="form-control">
                                    <option selected="selected" disabled="disabled">Select Teacher</option>
                                    @foreach($teachers as $teacher)
                                        <option {{($exam->teacher_id == $teacher->id) ? "selected" : ""  }} value="{{$teacher->id}}">{{$teacher['user']->First_Name . ' '. $teacher['user']->Last_Name}}</option>
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
                                <input type="text" value="{{$exam->Total_Marks}}" name="Total_Marks" class="form-control"  placeholder="Total Marks">
                            </div>
                            <div class="form-group">
                                <label>Passing Marks</label>
                                <input type="text" value="{{$exam->Passing_Marks}}" name="Passing_Marks" class="form-control"  placeholder="Passing Marks">
                            </div>
                            <div class="form-group">
                                <label>Start Date</label>
                                <input id="datepicker" placeholder="Exam Start Date" required="required" value="{{$exam->Start_Date}}" name="Start_Date" type="date" class="form-control " aria-required="true">
                            </div>
                            <div class="form-group">
                                <label>Start Time</label>
                                <input id="datepicker1"  required="required" value="{{$exam->Start_Time}}" name="Start_Time" type="time" class="form-control " aria-required="true">
                            </div>
                            <div class="form-group">
                                <label>End Time</label>
                                <input id="datepicker1"  required="required" value="{{$exam->End_Time}}" name="End_Time" type="time" class="form-control " aria-required="true">
                            </div>
                            {{csrf_field()}}
                            <button type="submit" value="" class="btn btn-success">Update Exam</button>
                            <a href="{{route('exam.index')}}" class="btn btn-primary test_toggle">Show All Exams</a>
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

