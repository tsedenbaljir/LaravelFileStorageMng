<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/ico" href="{{ url('adminlte/img/Logo.jpg') }}" />

    @include('partials.head')

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
</head>

<body class="hold-transition skin-blue sidebar-mini" style="font-family: 'Roboto', sans-serif;">

<div id="wrapper">

@include('partials.topbar')
@include('partials.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            @if(isset($siteTitle))
                <h3 class="page-title">
                    {{ $siteTitle }}
                </h3>
            @endif

            <div class="row">
                <div class="col-md-12">

                    @if (Session::has('message'))
                        <div class="alert alert-info">
                            <p>{{ Session::get('message') }}</p>
                        </div>
                    @endif
                    
                    @if ($errors->count() > 0)
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')

                </div>
            </div>
        </section>
    </div>
</div>

{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">Гарах</button>
{!! Form::close() !!}

@include('partials.javascripts')
</body>
</html>