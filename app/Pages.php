<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $fillable = [
        'id',
        'title',
        'description',
        'keywords',
        'url',
        'name',
        'text',
        'published',
        'published_at',
        'updated_at'
    ];
}
