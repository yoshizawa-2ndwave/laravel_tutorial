<html>
    <head>
        <title>Blog @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
        <p>side-bar</p>
        @show
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
