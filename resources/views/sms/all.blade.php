@extends('layouts.app')

@section('css')
<style type="text/css">
    th:last-child select {
    display: none;
}
    th:nth-child(6) select {
    display: none;
}
</style>
@endsection

@section('title' , 'SMS-Details')

@section('content')

    <div class="">
        <div class="heading_btns_area">
            <div class="pull-left">
                <h2 class="">All SMS</h2>
            </div>
            <!-- <div class="pull-right">
                <a href="{{route('sms.create')}}" class="btn btn-primary">Add New</a>
            </div> -->
            <div class="clearfix"></div>
        </div>

        <div class="clear20"></div>
        <div class="view_std_area table-responsive">
            <table id="example" class="table table-striped table-bordered display text-nowrap" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Sender</th>
                        <th>Receiver</th>
                        <th>Date</th>
                        <th>Text</th>
                        <th>Action</th>
                    </tr>
                </thead>
                 <tfoot>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Sender</th>
                        <th>Receiver</th>
                        <th>Date</th>
                        <th>Text</th>
                        <th>Action</th>
                    </tr>   
                 </tfoot>
                <tbody>

                @if(count($allSms) > 0)
                    @foreach($allSms as $sms)
                        <tr>
                            <td>
                                {{isset($sms['user']->First_Name) ? $sms['user']->First_Name : ""}}
                            </td>
                            <td>
                                {{isset($sms['user']->Last_Name) ? $sms['user']->Last_Name : ""}}
                            </td>
                            <td>
                                {{isset($sms['user']->Mobile) ? $sms['user']->Mobile : ""}}
                            </td>
                            <td>{{$sms->receiver}}</td>
                            <td>{{parse($sms->created_at)->format('l, M, Y, H:i:s')}}</td>
                            <td>{{$sms->text}}</td>
                            <td>
                                <a>
                                    <i class="fa fa-mobile"></i></i>
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
    @include('partials._scripts', ['model' => 'sms'])
@endsection