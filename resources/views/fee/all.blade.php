@extends('layouts.app')

@section('css')
<style type="text/css">
    th:last-child select {
    display: none;
}
</style>
@endsection
@section('title' , 'All-Fees')
@section('content')

    <div class="heading_btns_area">
        <div class="">
            <div class="pull-left">
                <h2>Student Fees</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('show_classes')}}" class="btn btn-primary btn-wide margin-top-10">Add New</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="">

        <div class="clear20"></div>
        <div class="view_std_area">
            <table id="example" class="table table-striped table-bordered display" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone No</th>
                    <th>Class NAme</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone No</th>
                    <th>Class NAme</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                    @foreach($fees as $fee)
                        <tr>
                            <td>{{ isset($fee->student) ? $fee->student->user->First_Name : ""}}</td>
                            <td>{{isset($fee->student) ? $fee->student->user->Last_Name : ""}}</td>
                            <td>{{isset($fee->student) ? $fee->student->user->Mobile : ""}}</td>
                            <td>{{isset($fee->student) ? ucfirst($fee->student->classes->first()->name) :""}}</td>
                            <td>{{ months($fee->month) }}</td>
                            <td>{{$fee->year}}</td>
                            <td>{{ucfirst($fee->status)}}</td>
                            <td>
                                {{--<a href="#" title="View"><i class="fa fa-eye"></i> </a>--}}
                                <a href="{{route('studentFeeSlip' , ['id'=>$fee->student->id])}}" title="View"><i class="fa fa-file" aria-hidden="true"></i> </a>
                                <a href="{{route('fee.edit' , [$fee->id])}}" title="Edit"><i class="fa fa-pencil"></i> </a>
                                <a href="{{route('delete_fee', [$fee->id])}}" title="Delete"><i class="fa fa-trash"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="clear40"></div>

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
    @include('partials._scripts', ['model' => 'exam'])
@endsection