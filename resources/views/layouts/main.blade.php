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
    <title>Titile</title>
</head>
<body>
    @yield('body')
</body>
@if(Route::currentName == 'result')
    <script src="{{asset('js/vue/vue.js')}}"></script>
    @yield('after_scripts')
    @endif
</html>