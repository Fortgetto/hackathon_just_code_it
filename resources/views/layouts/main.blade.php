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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Booooooooooom</button>
            <a href="{{--{{route('logout')}}--}}" class="curr-user">
                <i class="fa fa-cog"></i>
                <span class="u-name">{{$user->name}}</span>
                <span class="glyphicon glyphicon-remove"></span>
            </a>
        </div>
    </div>
</div>
    @yield('body')
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Heaader</h4>
            </div>
            <div class="modal-body">
                <p>parameters</p>
            </div>
            <div>
                <input type="text" placeholder="Word"><br />
                <input type="text" placeholder="Weight word"><br />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</body>
@yield('before_scripts')
<script>
    var articles = {!!$articles!!};
</script>
@yield('after_scripts')
@if(Route::currentRouteName() == 'results')

    @endif
</html>