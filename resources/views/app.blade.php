<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bands</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet">

    <script type="text/javascript" src={{ URL::asset('js/jquery-3.1.1.min.js') }}></script>
    <script type="text/javascript" src={{ URL::asset('js/bootstrap.min.js') }}></script>
    <script type="text/javascript" src={{ URL::asset('js/sweetalert.min.js') }}></script>
    <script type="text/javascript" src={{ URL::asset('js/global.js') }}></script>
    @yield('javascript')
</head>

<body>
<nav class="navbar-default navbar-static-top">
    <a class="navbar-brand">
        Bands Example
    </a>
    <div class="main-container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="{{ url('/') }}" class="dropdown-toggle" role="button" aria-expanded="false">Bands</a>
                </li>
                <li class="dropdown">
                    <a href="{{ url('/album') }}" class="dropdown-toggle" role="button" aria-expanded="false">Albums</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@yield('content')

</body>
</html>