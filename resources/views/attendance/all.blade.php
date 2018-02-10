@extends('layouts.app')

@section('css')
<style type="text/css">
    th:last-child select {
    display: none;
}
</style>
@endsection
@section('title' , 'All-Attendance')
@section('content')

    <div class="heading_btns_area">
        <div class="">
            <div class="pull-left">
                <h2>Student Attendance Details</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('attendance_classes')}}" class="btn btn-primary btn-wide margin-top-10">Add New</a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="">

        <div class="clear40"></div>
        <div class="view_std_area">

            @include('partials._attendance')

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
    @include('partials._scripts', ['model' => 'attendance'])
@endsection
