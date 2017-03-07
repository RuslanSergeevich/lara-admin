<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'id',
        'parent_id',
        'top_menu',
        'footer_menu',
        'name',
        'url',
        'main_menu',
        'sub_menu',
        'published_at',
        'updated_at'
    ];
}
