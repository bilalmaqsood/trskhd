<table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
    <thead>
    <tr>
        <th>Teacher</th>
        <th>Class</th>
        <th>Exam Title</th>
        <th>Start Date</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tests as $test)
        <tr>
            <td>{{$test['teacher']->user->First_Name ." ". $test['teacher']->user->Last_Name}}</td>
            <td>{{$test->examclass->name}}</td>
            <td>{{$test->Type}}</td>
            <td>{{$test->Start_Date}}</td>
            <td>{{$test->Start_Time}}</td>
            <td>{{$test->End_Time}}</td>
            <td>
                @if(Auth::user()->hasRole('admin'))
                    <a href="{{route('testDetails' , [$test->id])}}" title="View"><i class="fa fa-eye"></i> </a>
                    <a href="{{route('test.edit' , [$test->id])}}" title="Edit"><i class="fa fa-pencil"></i> </a>
                    <a href="#" title="Download Exam"><i class="fa fa-download"></i> </a>
                    <a href="javascript:void(0)" data-id="{{$test->id}}" class="delete" title="Delete"><i class="fa fa-trash"></i> </a>
                    <a href="{{route('test.show' , [$test->id])}}" title="View Test "><i class="fa fa-cloud-download"></i> </a>
                @else
                    <a href="{{route('test.details' ,[$test->id])}}" title="View Test "><i class="fa fa-cloud-download"></i> </a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
