@extends('layouts.app')

@section('css')
@endsection
@section('title' , 'All-Teachers')
@section('content')

    <div class="heading_btns_area">
        <div class="">
            <h2>Add Attendance Details</h2>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Attendance Sheet</div>
                <div class="panel-body">
                    <form method="post" action="{{route('add-teacher-attendance')}}">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Teacher Name</th>
                                <th>Gender</th>
                                <th>Absent</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($teachers as $teacher)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$teacher->user->First_Name.' '. $teacher->user->Last_Name}}</td>
                                        <td>{{ucfirst($teacher->user->Gender)}}</td>
                                        <td>
                                            <input type="checkbox" class="status" >
                                            <input class="teacher" type="hidden" name="teachers[{{$teacher->id}}]" value="present">
                                            
                                        </td>
                                    </tr>
                                @endforeach
                              </tbody>
                        </table>
                        <div id="teaches">

                        </div>
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-success">Add Attendance</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="clear40"></div>

@endsection

@section('js')

<script>

    $(function(){
        var teacherId = '{{$teacher->id}}';
        $('.status').on('click', function() {

            if (this.checked == true){
                $(this).next('.teacher').val('absent');
            }
        });
    });

</script>

@endsection

@section('scripts')

@endsection