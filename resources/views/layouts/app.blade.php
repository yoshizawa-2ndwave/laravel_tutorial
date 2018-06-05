<!DOCTYPE html>
<head>
<link rel="stylesheet" href="/css/app.css" type="text/css"/>
</head>
<html>
    <head>
        <title>Blog @yield('title')</title>
    </head>
    <body>
        <div class="col-xs-2">
            <div class="sidebar-nav">
            @section('sidebar')
            <ul class="nav">
                @if(Route::has('login'))
                    @auth
                <li>
                {{ link_to_route('logout','ログアウト', [], ['onclick' => 'event.preventDefault();document.getElementById("logout-form").submit();'])}}
                {{ Form::open( ['route' =>['logout'],'method'=>'post', 'id'=>'logout-form' ,'style' => 'dysplay:none;']) }}
                {{ Form::close() }}
                </li>
                    @else
                <li>{{ link_to_route('login','ログイン')}}</li>
                <li>{{ link_to_route('register','登録')}}</li>
                    @endauth
                @endif
                <li>{{ link_to_route('posts.index', '記事一覧')}}</il>
                @show
            </ul>
        </div>
        </div>
        <div class="container col-xs-10">
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
