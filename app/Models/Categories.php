<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $guarded = ['id'];
    protected $fillable = ['name', 'cat_id'];
    //
}
