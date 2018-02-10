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
                <h2>Teacher Attendance Details</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('teacher-attendance')}}" class="btn btn-primary btn-wide margin-top-10">Add New</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="">

        <div class="clear40"></div>
        <div class="view_std_area">

            <table id="example" class="table table-striped table-bordered display" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone No</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Status</th>
                    @if(Auth::user()->hasRole('admin'))
                        <th>Action</th>
                    @endif
                </tr>
                </thead>
                <tfoot>
                     <tr>
                    <th>Name</th>
                    <th>Phone No</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Status</th>
                    @if(Auth::user()->hasRole('admin'))
                        <th>Action</th>
                    @endif
                </tr>
                </tfoot>
                <tbody>
                @foreach($attendances as $attendance)
                <tr>
                    <td>{{ isset($attendance->teacher) ? $attendance->teacher->user->First_Name.' '.$attendance->teacher->user->Last_Name : ""}}</td>
                    <td>{{isset($attendance->teacher) ? $attendance->teacher->user->Mobile : ""}}</td>
                    <td>{{parse($attendance->teacher->created_at)->format('M')}}</td>
                    <td>{{parse($attendance->teacher->created_at)->format('Y')}}</td>
                    <td>{{ucfirst($attendance->status)}}</td>
                    @if(Auth::user()->hasRole('admin'))
                        <td>
                            <a href="{{route('attendance.edit' , [$attendance->id])}}" title="Edit"><i class="fa fa-pencil"></i> </a>
                            <a class="delete"  data-id="{{$attendance->id}}" href="javascript:void(0)" title="Delete" ><i class="fa fa-trash"></i> </a>
                        </td>
                        @endif
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

        $(document).on('click' , '.delete' , function (e) {

            var $this = $(this);
            var id    = $this.data('id');

            swal({
                showLoaderOnConfirm: true,
                title: "Alert",
                text: "Are you sure!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#007AFF",
                confirmButtonText: "confirm",
                cancelButtonText: "cancel",
                closeOnConfirm: true
            }, function() {
                $.ajax({
                    url    :  '{{ str_replace('-1','',route('teacher-delete-attendance',-1))  }}' + id,
                    headers: { 'X-XSRF-TOKEN' : '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}' },
                    error: function() {
                        swal("Cancelled", "Unable to delete ", "error");
                    },
                    success: function(response) {

                        swal("Success", "Deleted successfully !", "success");
//                    tr.remove();
                    location.reload();
                        if(response.success == 'true'){
                        }else{
                        }
                    },

                    type: 'POST'
                });
            });


        });


    </script>

@endsection
