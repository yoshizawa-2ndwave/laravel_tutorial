<!DOCTYPE html>
<head>
<!--
<link rel="stylesheet" href="/css/app.css" type="text/css"/>
-->
<style>
.sidebar {
    width:100px;
    margin:10px;
    float:left;
}
.button-rapper {
    padding-left: 120px;
}
table {
    width: 500px;
    th, td {
        margin: 10px;
        padding: 10px;
    }
}
</style>
</head>
<html>
    <head>
        <title>Blog @yield('title')</title>
    </head>
    <body>
        <div class="sidebar">
            @section('sidebar')
            <p>メニュー</p>
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
