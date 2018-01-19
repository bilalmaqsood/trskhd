<table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
    <thead>
    <tr>
        <th>Name</th>
        <th>Phone No</th>
        <th>Class NAme</th>
        <th>Status</th>
        @if(Auth::user()->hasRole('admin'))
            <th>Action</th>
        @endif
    </tr>
    </thead>
    <tbody>
    @foreach($attendances as $attendance)
        <td>{{ isset($attendance->student) ? $attendance->student->user->First_Name.' '.$attendance->student->user->Last_Name : ""}}</td>
        <td>{{isset($attendance->student) ? $attendance->student->user->Mobile : ""}}</td>
        <td>{{$attendance['student']->studentClass->name}}</td>
        <td>{{ucfirst($attendance->status)}}</td>
        @if(Auth::user()->hasRole('admin'))
            <td>
                <a href="{{route('attendance.edit' , [$attendance->id])}}" title="Edit"><i class="fa fa-pencil"></i> </a>
                <a class="delete"  data-id="{{$attendance->id}}" href="javascript:void(0)" title="Delete" ><i class="fa fa-trash"></i> </a>
            </td>
        @endif
        </tr>
    @endforeach
    </tbody>
</table>
