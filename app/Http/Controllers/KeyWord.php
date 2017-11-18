<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeyWord extends Controller
{
    public function index()
    {
        $data['list'] = DB::table('keywords')->get();
        foreach ($data['list'] as $key=>$val)
        {
            $array_ids_words = DB::table('keyword_categories')->where('id_keyword',$val['id'])->get();
            $data['list'][$key]['categories'] = DB::table('categories')->whereIn('id',$array_ids_words)->select('name')->get();
        }
        //$array_ids_words = DB::table('keyword_categories')->
        //$data['list'] = DB::table('')
        return view('keyword',$data);
    }
    public function add_key_word()
    {
        if(DB::table('keywords')->where('name', $_REQUEST['Name'])->value('name') != "")
        {
            abort(404, 'Такое ключевое слово уже существует');
        }
        else
            DB::table('keywords')->insert([
                'name' => $_REQUEST['Name']
            ]);
    }
    public function drop_key_word()
    {
        DB::table('keywords')->where('name',$_REQUEST['Name'])->delete();
    }
}
