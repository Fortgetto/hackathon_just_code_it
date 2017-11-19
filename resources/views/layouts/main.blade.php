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
    {{--<style>--}}
        {{--*{--}}
            {{--font-family: -apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif;--}}
            {{--font-size: 1rem;--}}
            {{--font-weight: 400;--}}
            {{--line-height: 1.5;--}}
        {{--}--}}

    {{--</style>--}}
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
                Ключевые слова
            </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
                Категории
            </button>
            <a href="{{--{{route('logout')}}--}}" class="curr-user">
                <i class="fa fa-cog"></i>
                <span class="u-name">{{$user->name}}</span>
                <span class="glyphicon glyphicon-remove"></span>
            </a>
        </div>
    </div>
</div>
    @yield('body')

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ключевые слова</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="usr">Название слова:</label>
                    <input type="text" class="form-control" id="nameword">
                </div>
                <div class="form-group">
                    <label for="usr">Вес слова:</label>
                    <input type="text" class="form-control" id="widthword">
                </div>
                <div class="form-group">
                    <label for="usr">Множитель слова:</label>
                    <input type="text" class="form-control" id="multiword">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-success" onclick="location.href = '/addword/?nameword='+$('#nameword').val()+'&widthword='+$('#widthword').val()+'&multiword='+$('#multiword').val()">Добавить слово</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Категории</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="usr">Название критерии:</label>
                    <input type="text" class="form-control" id="namecat">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-success" onclick="location.href = '/addcat/?namecat='+$('#namecat').val()+''">Добавить категорию</button>
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