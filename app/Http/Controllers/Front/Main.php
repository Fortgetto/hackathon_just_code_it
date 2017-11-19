<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;;
use App\Models\News;
use App\Models\KeyWord;
use App\Models\Categories;
use App\User;
use Carbon\Carbon;
use App\Models\Favs;

class Main extends Controller
{
    public function index(Request $request){

        $this->data['url'] = 'youtube.com';
        $this->data['raiting'] = '125';
//        $this->data['date'] = '22.11.2018';
        $this->data['user'] = User::where('id',1)->first();
        $this->data['paginator'] = News::paginate($this->data['user']->on_page);
        $this->data['articles'] = $this->data['paginator'];
        foreach ($this->data['articles'] as $k => $v){
            $this->data['articles'][$k]['description'] = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A eaque illum sed voluptatem! Dolore exercitationem reiciendis repellat repellendus unde? Ab amet deleniti explicabo facere laboriosam libero molestiae omnis quam ut.';
            $this->data['articles'][$k]['keywords'] = ['футбол','ставки','чемпионат мира','Бразилия'];
            $this->data['articles'][$k]['date'] = Carbon::now()->format('Y-m-d H:i:s');
            $this->data['articles'][$k]['raiting'] = '125';
            $this->data['articles'][$k]['link'] = 'youtube.com';
        }
        $this->data['favs'] = Favs::where('user_id',$this->data['user']->id)->pluck('news_id');

        $keys_words = KeyWord::get()->toArray();
        $text = News::limit(5)->get()->keyBy('id')->toArray();

        foreach ($text as $key=>$value)
        {
            $rate = 0;
            foreach ($keys_words as $keys)
                if(strpos($value['text'],$keys['name']) === true)
                {
                    $rate += (int)$keys['width'];
                }
            $text[$key]['rate'] = $rate;
//            $text[$key]['time'] = Carbon::createFromFormat('H:i, d F Y');
            News::where('id', $keys['id'])
            ->update(['rate' => (int)$rate]);
        }
        $this->data['list'] = $text;
        //var_dump($text);
        //exit;
        return view('tabs.'.$request->route()->getName(), $this->data);
    }
    public function calculation()
    {

        //return view('result',$data);
    }
}
