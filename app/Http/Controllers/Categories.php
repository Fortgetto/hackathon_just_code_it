<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Categories extends Controller
{
    public function index()
    {
        //$data['list'] = DB::table('categories')->where()
        return veiw('categories', $data);
    }
    public function add_category()
    {
        if(DB::table('categories')->where('name', $_REQUEST['Name'])->value('name') != "")
        {
            abort(404, 'Такая категория существует');
        }
        else
            DB::table('categories')->insert([
                'name' => $_REQUEST['Name']
            ]);
    }
    public function remove_category()
    {
        DB::table('categories')->where('name',$_REQUEST['Name'])->delete();
    }
    public function edit_category()
    {

    }
}
