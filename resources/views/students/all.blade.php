@extends('layouts.app')

@section('css')
<style type="text/css">
    th:last-child select {
    display: none;
}
</style>
@endsection

@section('title' , 'All-Students')

@section('content')
    <div class="">

        <div class="heading_btns_area">
            <div class="pull-left">
                <h2 class="">All Students</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('student.create')}}" class="btn btn-primary btn-wide margin-top-10">Add New</a>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="clear40"></div>
        <div class="view_std_area table-responsive">
            <table id="example" class="table table-striped table-bordered display text-nowrap" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>User Name</th>
                    <th>Phone No</th>
                    <th>Class</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>CNIC NO</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
            <tr>
                <th>First Name</th>
                    <th>Last Name</th>
                    <th>User Name</th>
                    <th>Phone No</th>
                    <th>Class</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>CNIC NO</th>
                    <th></th>
            </tr>
        </tfoot>
                <tbody>

                    @foreach($students as $student)
                        <tr>
                            <td>{{$student['user']->First_Name}}</td>
                            <td>{{$student['user']->Last_Name}}</td>
                            <td>{{$student['user']->username}}</td>
                            <td>{{$student['user']->Mobile}}</td>
                            <td>{{isset($student->classes->first()->name) ? $student->classes->first()->name : ""}}</td>
                            <td>{{parse($student->Admission_Date)->format('M')}}</td>
                            <td>{{parse($student->Admission_Date)->format('Y')}}</td>
                            <td>{{$student['user']->CNIC}}</td>
                            <td>
                                <a href="{{route('student.show' , [$student->id])}}" title="View"><i class="fa fa-eye"></i> </a>
                                <a href="{{route('studentFeeSlip' , ['id'=>$student->id])}}" title="View"><i class="fa fa-file" aria-hidden="true"></i> </a>
                                <a href="{{route('student.result' , ['id' => $student->id])}}" title="View"><i class="fa fa-ambulance"></i> </a>
                                <a href="{{route('student.edit' , [$student->id])}}" title="Edit"><i class="fa fa-pencil"></i> </a>
                                <a class="status" data-id="{{$student['user']->id}}" href="javascript:void(0)"  title="{{($student['user']->Activated) ? 'Un Lock' :  'Locked'}}">
                                    <i class="fa {{($student['user']->Activated) ? 'fa-unlock' :  'fa-lock'}} "></i>
                                </a>
                                <a href="{{route('studentSlip' , [$student->id])}}" title="Roll Number Slip">
                                    <i class="fa fa-link"></i>
                                </a>
                                <a href="{{route('student-card',[$student->id])}}" title="Card">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                </a>
                                <a class="delete" data-id="{{$student['user']->id}}" href="javascript:void(0)" title="Delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

    </div>

@endsection

@section('js')

    <script>

        $(document).ready(function() {
    $('#example').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );

    </script>

@endsection

@section('scripts')
    @include('partials._scripts', ['model' => 'student'])
    @include('partials._status', ['model' => 'student'])
@endsection