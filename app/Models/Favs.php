<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favs extends Model
{
    protected $table = 'user_favs';
    protected $guarded = ['id'];
    protected $fillable = ['user_id', 'news_id'];
}
