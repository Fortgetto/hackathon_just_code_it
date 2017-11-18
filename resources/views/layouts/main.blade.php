<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/fa/font-awesome.min.css')}}">
    <script src="{{asset('js/vue/vue.js')}}"></script>
    <title>Titile</title>
</head>
<body>
<div class="head-wpr">
    <div class="head-tab-menu">
        <div class="tabs-wrp">
            <a href="{{(Route::currentRouteName() == 'results')?'javascript:void(0)':Url::to('results')}}" class="nav-tab {{(Route::currentRouteName() == 'results')?'active':''}}">РЕЗУЛЬТАТЫ</a>
            <a href="" class="nav-tab {{(Route::currentRouteName() == 'favourites')?'active':''}}">ИЗБРАННОЕ</a>
            <div class="nav-tab {{(Route::currentRouteName() == 'comparison')?'active':''}}">СРАВНИТЬ</div>
        </div>
        <div class="curr-user">
            <a href="{{--{{route('logout')}}--}}" class="curr-user">
                <i class="fa fa-cog"></i>
                <span class="u-name">{{--{{$user->name}}--}}</span>
                <span class="glyphicon glyphicon-remove"></span>
            </a>
        </div>
    </div>
</div>
    @yield('body')
</body>
@yield('before_scripts')
<script>
    var articles = {!!$articles!!};
</script>
@yield('after_scripts')
@if(Route::currentRouteName() == 'results')

    @endif
</html>