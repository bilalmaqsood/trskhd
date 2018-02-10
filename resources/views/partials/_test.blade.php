<div class="test_information table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Class</th>
            <th>Book</th>
            <th>Total Marks</th>
            <th>Passing Marks</th>
            <th>Obtained Marks</th>
        </tr>
        </thead>
        <tbody>
        @foreach($test['details'] as $detail)
            <tr>
               <td>{{$detail['student']->user->First_Name.' '.$detail['student']->user->Last_Name }}</td>
                <td>{{$test['examclass']->name}}</td>
                <td>{{$test['book']->name}}</td>
                <td>{{$test->Total_Marks}}</td>
                <td>{{$test->Passing_Marks}}</td>
                <td>{{$detail->marks}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
