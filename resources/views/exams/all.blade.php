@extends('layouts.app')

@section('css')
<style type="text/css">
    th:last-child select {
    display: none;
}
th:first-child select {
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
@section('title' , 'All-Exams')
@section('content')

    <div class="heading_btns_area">
        <div class="">
            <div class="pull-left">
                <h2>Exams</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('exam.create')}}" class="btn btn-primary btn-wide margin-top-10">Create Exam</a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clear40"></div>
    <div class="">
        @include('partials._exams')
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
    @include('partials._scripts', ['model' => 'exam'])
@endsection