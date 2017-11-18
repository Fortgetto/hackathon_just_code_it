@extends('layouts.main')
@section('body')
<div id="result" class="main-wrp">
    <div class="ctrl-panel-wrp">
        <div class="ctrl-left">
            <a href="javascript:void(0)" class="ctrl-buttons date" @click="sort()">Дата <i class="fa fa-arrow-circle-o-down"></i></a>
            <a href="javascript:void(0)" class="ctrl-buttons rait" @click="sort()">Рейтинг<i class="fa fa-arrow-circle-o-up"></i></a>
            <a href="javascript:void(0)" @click="pop_panel()" class="ctrl-buttons opts fa fa-cog" title="настройки"></a>
            <a href="javascript:void(0)" @click="table_opts()" class="ctrl-buttons date fa fa-reorder" title="настройки таблицы"></a>
        </div>
        <div class="ctrl-right">
            <div class="pag-wrp">
                <div class="inner-wrp">
                    <a href="javascript:void(0)" class="res-count {{($user->on_page)?'active':''}}">10</a>
                    <a href="javascript:void(0)" class="res-count {{($user->on_page)?'active':''}}">20</a>
                    <a href="javascript:void(0)" class="res-count {{($user->on_page)?'active':''}}">50</a>
                    <a href="javascript:void(0)" class="res-count {{($user->on_page)?'active':''}}">99</a>
                </div>
            </div>
            <div class="pag-wrp">
                {{$paginator}}
            </div>
        </div>
    </div>
    <div class="main-table-wrp">
        <div class="result-wrp" v-for="art in results">
            <div title="дата">@{{ art.date }}</div>
            <div title="raiting">@{{ art.raiting }}</div>
            <div title="key-words"><span v-for="(itm,$k,i) in art.keywords" v-if="i < 5">@{{ itm }}</span></div>
            <div title="result-date">@{{ art.descritption }}</div>
            <div title="result-date">@{{ art.link }}</div>
            <div class="fa fa-chevron-down"></div>
            <div class="fa fa-exchange" title="сравнить"></div>
            <div class="fa fa-remove"></div>
            <div class="fa fa-font-awesome"></div>
        </div>
    </div>
</div>
<script>
    var articles = {!!$articles->toJson()!!};

</script>
<script src="{{asset('js/main.js')}}"></script>
@endsection
@section('before_scripts')
    <script>

        {{--var date = {{$date}};--}}
        {{--var raiting = {{$raiting}};--}}
        {{--var keywords = {{json_encode($keywods)}};--}}
    </script>
@endsection