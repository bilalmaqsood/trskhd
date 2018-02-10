@extends('layouts.app')

@section('css')
@endsection
@section('title' , 'All-Fees')
@section('content')

    <div class="heading_btns_area">
        <div class="">
            <h2>Add Fees Details</h2>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Fee Sheet</div>
                <div class="panel-body">
                    <form method="post" action="{{route('add_fees')}}">
                        <div class="col-sm-6">
                            <select name="year" id="years" class="form-control">
                                <option value='' selected disabled="">--Select Year--</option>
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
                        <div class="col-sm-6">
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

                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Student Name</th>
                                <th>Gender</th>
                                <th>Class</th>
                                <th>No Fee</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($class->students as $student)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$student->user->First_Name.' '. $student->user->Last_Name}}</td>
                                        <td>{{ucfirst($student->user->Gender)}}</td>
                                        <td>{{$class->name}}</td>
                                        <td>
                                            <!-- <input type="checkbox" name="students[{{$student->id}}]" value="pending"> -->
                                            <div class="checkbox clip-check check-primary">
                                                        <input id="students[{{$student->id}}]" name="students[{{$student->id}}]" value="pending" type="checkbox">
                                                        <label for="students[{{$student->id}}]">
                                                           
                                                        </label>
                                                    </div>
                                        </td>
                                    </tr>
                                @endforeach
                              </tbody>
                        </table>
                        <input type="hidden" name="class_id" value="{{$class->id}}">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-success btn-wide">Send SMS</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="clear40"></div>

@endsection

@section('js')



@endsection

@section('scripts')

@endsection