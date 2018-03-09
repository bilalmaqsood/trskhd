@extends('layouts.app')

@section('css')
    <style type="text/css">
        th:last-child select {
            display: none;
        }
    </style>
@endsection

@section('title' , 'All-Invemtroies')

@section('content')
<!-- header starts  -->
<div class="">
    <div class="heading_btns_area">
        <div class="pull-left">
            <h2 class="">All Inventroies</h2>
        </div>
        <div class="pull-right">
            <a href="{{route('inventories.create')}}" class="btn btn-primary btn-wide margin-top-10">Add New</a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clear40"></div>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered display text-nowrap" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Title</th>
            <th>Month</th>
            <th>Year</th>
            <th>
              Action
            </th>
          </tr>
        </thead>
        <tbody>
        @foreach($inventories as $inventory)
            <tr>
            <td>{{$inventory->title}}</td>
            <td>{{ months($inventory->month) }}</td>
            <td>{{$inventory->year}}</td>
            <td>
                <a href="{{route('inventories.show' , [$inventory->id])}}" title="View"><i class="fa fa-eye"></i> </a>
                <a href="{{route('inventories.edit' , [$inventory->id])}}" title="Edit"><i class="fa fa-pencil"></i> </a>
                <a href="{{route('inventory_details.add' , [$inventory->id])}}" title="Edit"><i class="fa fa-edit"></i></i> </a>
                <a class="delete" data-id="{{$inventory->id}}" href="javascript:void(0)" title="Delete">
                    <i class="fa fa-trash"></i>
                </a>
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
    @include('partials._scripts', ['model' => 'inventories'])
@endsection