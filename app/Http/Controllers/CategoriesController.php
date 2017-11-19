<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        $data['list'] = \DB::table('categories')->get();
        //$data['list'] = DB::table('categories')->where()
        //var_dump($data['list']);
        return veiw('categories', $data);
    }
    public function add_category()
    {
        if(\DB::table('categories')->where('name', $_REQUEST['Name'])->value('name') != "")
        {
            abort(404, 'Такая категория существует');
        }
        else
            \DB::table('categories')->insert([
                'name' => $_REQUEST['Name']
            ]);
    }
    public function remove_category()
    {
        \DB::table('categories')->where('name',$_REQUEST['Name'])->delete();
    }
    public function edit_category()
    {

    }
}

