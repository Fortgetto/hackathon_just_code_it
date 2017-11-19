<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeyWordController extends Controller
{
    public function index()
    {
        $data['list'] = \DB::table('keywords')->get();
        $data['list'] = $data['list']->toArray();
        //var_dump($data['list']);
        foreach ($data['list'] as $key=>$val)
        {

            $array_ids_words = \DB::table('keyword_categories')->select('id_cat')->where('id_keyword',$val->id)->get();
            $array_ids_words = $array_ids_words->toArray();
            $catigors = array();
            foreach ($array_ids_words as $catigor)
                $catigors[] = $catigor->id_cat;
            //var_dump($catigors);
            //exit;
            $data['list'][$key]->categories = \DB::table('categories')->whereIn('id',$catigors)->select('name')->get()->toArray();
            //var_dump($data['list'][$key]->categories);
            //exit;
        }
        //$array_ids_words = DB::table('keyword_categories')->
        //$data['list'] = DB::table('')
        return view('keyword',$data);
    }
    public function add_key_word()
    {
        if(\DB::table('keywords')->where('name', $_REQUEST['Name'])->value('name') != "")
        {
            abort(404, 'Такое ключевое слово уже существует');
        }
        else
            \DB::table('keywords')->insert([
                'name' => $_REQUEST['Name']
            ]);
    }
    public function drop_key_word()
    {
        \DB::table('keywords')->where('name',$_REQUEST['Name'])->delete();
    }
}
