@extends('layouts.app')

@section('title' , 'All Staff')
@section('css')
<style type="text/css">
    th:last-child select {
    display: none;
}
</style>
@endsection

@section('title' , 'Teachers')

@section('content')

    <div class="">

        <div class="heading_btns_area">
            <div class="pull-left">
                <h2 class="">All Teachers</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('teacher.create')}}" class="btn btn-primary btn-wide margin-top-10">Add New</a>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="clear40"></div>
        <div class="view_std_area">
            <table id="example" class="table table-striped table-bordered display" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone No</th>
                    <th>Designation</th>
                    <th>CNIC NO</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone No</th>
                    <th>Designation</th>
                    <th>CNIC NO</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                    @if(isset($teachers))
                        @foreach($teachers as $teacher)
                            <tr>
                                <td>{{$teacher['user']->First_Name }}</td>
                                <td>{{$teacher['user']->Last_Name}}</td>
                                <td>{{$teacher['user']->Mobile}}</td>
                                <td>{{$teacher->Designation}}</td>
                                <td>{{$teacher['user']->CNIC}}</td>
                                <td>{{parse($teacher->Joining_Date)->format('M')}}</td>
                                <td>{{parse($teacher->Joining_Date)->format('Y')}}</td>
                                <td>
                                    <a href="{{route('teacher.show' , [$teacher->id])}}" title="View"><i class="fa fa-eye"></i> </a>
                                    <a href="{{route('teacher.edit' , [$teacher->id])}}" title="Edit"><i class="fa fa-pencil"></i> </a>
                                    <a class="status" data-id="{{$teacher['user']->id}}" href="javascript:void(0)" title="{{($teacher['user']->Activated) ? 'Un Lock' :  'Locked'}}">
                                        <i class="fa {{($teacher['user']->Activated) ? 'fa-unlock' :  'fa-lock'}} "></i>
                                    </a>

                                    <a href="{{route('view_salary_slip' , [$teacher->id])}}" title="Salary Slip">
                                        <i class="fa fa-link"></i>
                                    </a>
                                    <a href="{{route('teacher-card',[$teacher->id])}}" title="Card">
                                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                                    </a>
                                    <a class="delete" data-id="{{$teacher['user']->id}}" href="javascript:void(0)" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
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
    @include('partials._scripts', ['model' => 'teacher'])
    @include('partials._status', ['model' => 'teacher'])
@endsection