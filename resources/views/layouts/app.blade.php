<!doctype html>
<html lang="en">
<head>

    <title>@yield('title')</title>
    @yield('css')
</head>

<body>

@include('layouts.partials._header')

<div class="container">
    @yield('content')
</div>

@include('layouts.partials._footer')



<!-- Scripts Start -->
    <script language="javascript" type="text/javascript" src="../assets/scripts/jquery-1.11.3.min.js"></script>

    <script language="javascript" type="text/javascript" src="../assets/scripts/jquery.flexslider.js"></script>
    <script language="javascript" type="text/javascript" src="../assets/scripts/bootstrap.min.js"></script>
    <script language="javascript" type="text/javascript" src="../assets/scripts/bootsnav.js"></script>
    <script language="javascript" type="text/javascript" src="../assets/scripts/custom.js"></script>
<!-- Scripts End -->

@yield('js')

<script>
    $(function(){
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

    })

</script>
</body>

</html>
