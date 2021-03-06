<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'id',
        'title',
        'description',
        'keywords',
        'url',
        'name',
        'text',
        'small_text',
        'published',
        'img',
        'published_at',
        'updated_at'
    ];
}
