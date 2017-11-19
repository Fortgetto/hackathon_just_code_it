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
        $this->data['paginator'] = News::paginate(1);
        $this->data['articles'] = $this->data['paginator'];
        foreach ($this->data['articles'] as $k => $v){
            $this->data['articles'][$k]['description'] = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A eaque illum sed voluptatem! Dolore exercitationem reiciendis repellat repellendus unde? Ab amet deleniti explicabo facere laboriosam libero molestiae omnis quam ut.';
            $this->data['articles'][$k]['keywords'] = ['футбол','ставки','чемпионат мира','Бразилия'];
            $this->data['articles'][$k]['date'] = Carbon::now()->format('Y-m-d H:i:s');
            $this->data['articles'][$k]['raiting'] = '125';
            $this->data['articles'][$k]['link'] = 'youtube.com';
        }
//        $this->data['keywords'] = ;
        $this->data['favs'] = Favs::where('user_id',$this->data['user']->id)->pluck('news_id');
//        $this->data['description'] = ;
//        dd($this->data);
        return view('tabs.'.$request->route()->getName(), $this->data);
    }
    public function calculation()
    {
        $keys_words = KeyWord::get()->toArray();
        $text = News::get()->toArray();
        //var_dump($keys_words);
        //var_dump($text);
        //exit;
        $rate = 0;
        foreach ($text as $value)
        {
            foreach ($keys_words as $keys)
                if(strpos($value['text'],$keys['name']) === true)
                {
                    /*echo $keys['name']. " ". $value['id'];*/
                    $rate += $keys['width'];
                }
            $text['rate'] = $rate;

        }
    }
}
