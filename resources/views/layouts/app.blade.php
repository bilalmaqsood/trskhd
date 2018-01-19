<!doctype html>
<html lang="en">
<head>

    @include('layouts.partials._head')
    <title>@yield('title')</title>

    @yield('css')


</head>

<body>

@include('layouts.partials._header')

<div class="container">
    @yield('content')
</div>

@include('layouts.partials._footer')



@yield('js')

@yield('scripts')

<script>
    var ajax_url = '/';

    function ajx(url, type, data, successCallback, dataType) {
        if (dataType == '' || dataType == undefined)
            dataType = 'json';
        $.ajax({
            url: url,
            type: type,
            data: data,
            dataType: dataType,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
            .done(successCallback)
            .fail(function (res) {
                //(res);
            });
    }

    /*var $imageupload = $('.imageupload');
    $imageupload.imageupload({
        maxFileSizeKb: 2048
    });*/

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
</body>

</html>
