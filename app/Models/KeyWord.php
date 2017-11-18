<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeyWord extends Model
{
    protected $table = 'keywords';
    protected $guarded = ['id'];
    protected $fillable = ['name', 'key_word_id'];
}
