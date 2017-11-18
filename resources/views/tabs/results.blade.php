@extends('layouts.main')
@section('body')
<div id="result" class="main-wrp">
    <div class="ctrl-panel-wrp">
        <div class="ctrl-left">
            <a href="javascript:void(0)" @click="sort()">Дата <i class="fa fa-arrow-circle-o-down"></i></a>
            <a href="javascript:void(0)" @click="sort()">Рейтинг<i class="fa fa-arrow-circle-o-up"></i></a>
            <a href="javascript:void(0)" @click="pop_panel()" class="fa fa-cog" title="настройки"></a>
            <a href="javascript:void(0)" @click="table_opts()" class="fa fa-reorder" title="настройки"></a>
        </div>
        <div class="ctrl-right">
            <div class="pag-wrp">
                <a href="javascript:void(0)" class="res-count {{($user->on_page)?'active':''}}">10</a>
                <a href="javascript:void(0)" class="res-count {{($user->on_page)?'active':''}}">20</a>
                <a href="javascript:void(0)" class="res-count {{($user->on_page)?'active':''}}">50</a>
                <a href="javascript:void(0)" class="res-count {{($user->on_page)?'active':''}}">99</a>
            </div>
            <div class="pag-wrp">
                {{$paginator}}
            </div>
        </div>
    </div>
    <div class="main-table-wrp">
        {{--<div class="result-wrp">--}}
            {{--<div title="дата">@{{ results.date }}</div>--}}
            {{--<div title="result-date">@{{ results.raiting }}</div>--}}
            {{--<div title="result-date">@{{ results.keywords }}</div>--}}
            {{--<div title="result-date">@{{ results.short_desc }}</div>--}}
            {{--<div title="result-date">@{{ results.link }}</div>--}}
            {{--<div class="fa fa-chevron-down"></div>--}}
            {{--<div class="fa fa-exchange" title="сравнить"></div>--}}
            {{--<div class="fa fa-remove"></div>--}}
            {{--<div class="fa fa-font-awesome"></div>--}}
        {{--</div>--}}
    </div>
</div>
@endsection