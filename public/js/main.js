const results = new Vue({
    el:'#result',
    data:{
        results:articles,
        favs:favourites,
        table_opts:{
            time:{name:'Дата',val:1},
            rate:{name:'Рэйтинг',val:1},
            keywords:{name:'Ключевые слова',val:1},
            text:{name:'Статьи',val:1},
            link:{name:'Ссылки на новость',val:1},
            // logo:{name:'Логотип',val:1},
            favs:{name:'Избранное',val:1},
            del:{name:'Удаление',val:1}
        },
        tab_opts:false
    },
    methods:{
        pop_panel:function () {

        },
        // table_opts:function () {
        //
        // },
        sort:function () {
            
        },
        set_table:function (e) {
            (e.checked)?this.table_opts[e.id].val=0:this.table_opts[e.id].val=1;
        },
        colored:function (v) {
            var col = 'green';
            if(v > 500){
                col = 'big-red'
            }else if(v > 100){
                col = 'red'
            };
            return col
        }
    }
});