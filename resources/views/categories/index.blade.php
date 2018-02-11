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
                <h2 class="">All Categories</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('categories.create')}}" class="btn btn-primary btn-wide margin-top-10">Add New</a>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="clear40"></div>
        <div class="view_std_area table-responsive">
            <table id="example" class="table table-striped table-bordered display text-nowrap" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Categroy Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>

                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>{{$category->price}}</td>

                            <td>
                                <a href="{{route('categories.show' , [$category->id])}}" title="View"><i class="fa fa-eye"></i> </a>
                                <a href="{{route('categories.edit' , [$category->id])}}" title="Edit"><i class="fa fa-pencil"></i> </a>
                                <a class="delete" data-id="{{$category->id}}" href="javascript:void(0)" title="Delete">
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
    @include('partials._scripts', ['model' => 'categories'])
@endsection