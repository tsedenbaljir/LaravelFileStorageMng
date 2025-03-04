<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/ico" href="http://tsedenbaljir.itpdarkhan.mn/adminlte/img/LogoITP.png" />

    @include('partials.head')
</head>

<body class="page-header-fixed">

    <div style="margin-top: 10%;"></div>

    <div class="container-fluid">
        @yield('content')
    </div>

    <div class="scroll-to-top"
         style="display: none;">
        <i class="fa fa-arrow-up"></i>
    </div>

    @include('partials.javascripts')

</body>
</html>