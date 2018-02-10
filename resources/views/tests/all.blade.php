@extends('layouts.app')

@section('title' , 'All Tests')
@section('css')
<style type="text/css">
    th:last-child select {
    display: none;
}

 th:nth-of-type(6) select {
    display: none;
}
 th:nth-of-type(7) select {
    display: none;
}
 th:nth-of-type(8) select {
    display: none;
}
</style>
@endsection
@section('title' , 'All-Tests')
@section('content')

    <div class="heading_btns_area">
        <div class="">
            <div class="pull-left">
                <h2>Tests All</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('test.create')}}" class="btn btn-primary btn-wide margin-top-10">Create Test</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clear40"></div>
    <div class="">
        @include('partials._all_tests')
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
    @include('partials._scripts', ['model' => 'test'])
@endsection