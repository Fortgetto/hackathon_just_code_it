@extends('layouts.main')
@section('body')


<div id="result" class="main-wrp">
    <div class="ctrl-panel-wrp">
        <div class="ctrl-left">
            <a href="javascript:location.href = '/?sortingDate'" class="ctrl-buttons date" @click="sort()">Дата <i class="fa fa-arrow-circle-o-down"></i></a>
            <a href="javascript:location.href = '/?sortingRate'" class="ctrl-buttons rait" @click="sort()">Рейтинг<i class="fa fa-arrow-circle-o-up"></i></a>
            <a href="javascript:void(0)" @click="pop_panel()" class="ctrl-buttons opts fa fa-cog" title="настройки"></a>
            <div v-cloak v-if="tab_opts" class="dropdown-wrap">
                <div class="wrrp">
                    <a href="javascript:void(0)" @click="tab_opts = false" class="ctrl-buttons date fa fa-reorder" title="настройки таблицы"></a>
                    <a href="javascript:void(0)" @click="tab_opts = false" class="ctrl-buttons date fa fa-remove" title="закрыть"></a>

                </div>
                <div class="inputs-wrp" v-for="(opts,$k) in table_opts">
                    <label :for="$k">@{{ opts.name }}</label>
                        <input :id="$k" type="checkbox" :checked="(opts)?'true':'false'" @click="set_table($event.target)">
                </div>
            </div>
            <a v-else href="javascript:void(0)" @click="tab_opts = true" class="ctrl-buttons date fa fa-reorder" title="настройки таблицы"></a>
            <div class="drop-opt" v-if="table_opts == true">
                <template v-for="(opt,ind) in table_opts">
                    <label for="'opt'+ind">
                        <input :id="'opt'+ind" type="checkbox" @change="">
                    </label>
                </template>
            </div>
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
        <div class="result-wrp" v-for="(art,ind) in results" v-cloak>
            <div class="section date" v-if="table_opts.time.val">@{{ art.time }}</div>
            <div :class="'section rait '+colored(art.rate)" v-if="table_opts.rate.val" >@{{ art.rate }}</div>
            <div class="section keywords" v-if="table_opts.keywords.val"> <span v-for="(itm,$k) in art.keywords" v-if="$k < 5">@{{ itm }}</span></div>
            <div class="section desc" v-if="table_opts.text.val" title="result-date">@{{ art.text }}</div>
            <div class="section link" v-if="table_opts.link.val" title="result-date"><a :href="art.link">Источник Lenta.ru</a></div>
            <div class="section soc-btn">
                <div class="fa fa-chevron-down"></div>
                <div class="fa fa-exchange" title="сравнить"></div>
                <div class="fa fa-remove"></div>
                <div :class="'fa fa-font-awesome' {{--'+(favs.hasOwnProperty(ind))?'fav':''--}}"></div>
            </div>
        </div>
    </div>
</div>
<script>
    var articles = {!!json_encode($list)!!};
    var favourites = {!!$favs->toJson()!!};

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

