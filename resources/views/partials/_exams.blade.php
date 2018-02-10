<table id="example" class="table table-striped table-bordered display" width="100%" cellspacing="0">
    <thead>
    <tr>
        <th>No</th>
        <th>Class</th>
        <th>Exam Title</th>
        <th>Month</th>
        <th>Year</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Books</th>

            <th>Action</th>

    </tr>
    <tfoot>
        <tr>
        <th>No</th>
        <th>Class</th>
        <th>Exam Title</th>
        <th>Month</th>
        <th>Year</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Books</th>

            <th>Action</th>

    </tr>
    </tfoot>
    </thead>
    <tbody>
    @foreach($exams as $exam)
        <tr>
            {{--<td>{{$exam['teacher']->user->First_Name ." ". $exam['teacher']->user->Last_Name}}</td>--}}
            <td>{{$loop->iteration}}</td>
            <td>{{$exam->examclass->name}}</td>
            <td>{{parse($exam->Start_Date)->format('M')}}</td>
            <td>{{parse($exam->Start_Date)->format('Y')}}</td>
            <td>{{$exam->Type}}</td>
            <td>{{$exam->Start_Date}}</td>
            <td>{{$exam->End_Date}}</td>
            <td>{{count($exam->details)}}</td>
            <td>
                @if(Auth::user()->hasRole('admin'))
                    <a href="#" title="Edit"><i class="fa fa-edit"></i> </a>
                    <a href="{{route('exam.show' , [$exam->id])}}" title="View"><i class="fa fa-eye"></i> </a>
                    <a href="#" title="Download Exam"><i class="fa fa-download"></i> </a>
                    <a href="javascript:void(0)" data-id="{{$exam->id}}" class="delete" title="Delete"><i class="fa fa-trash"></i> </a>
                @else
                    <a href="{{route('exams.details' , [$exam->id])}}" title="View"><i class="fa fa-eye"></i> </a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
