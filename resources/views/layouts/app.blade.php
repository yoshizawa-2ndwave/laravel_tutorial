<!DOCTYPE html>
<head>
<!--
<link rel="stylesheet" href="css/app.css" type="text/css"/></head>
-->
<html>
    <head>
        <title>Blog @yield('title')</title>
    </head>
    <body>
        <div class="sidebar">
            @section('sidebar')
            <p>side-bar</p>
            @show
        </div>
        <div class="container">
            @yield('content')
        </div>
    </body>
    <script>
        function disp(){
            if(confirm("本当に削除しますか？")){
            }else{
                return false;
            }
        };
    </script>
</html>
