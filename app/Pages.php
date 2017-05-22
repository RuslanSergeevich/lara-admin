<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $fillable = [
        'id',
        'parent_id',
        'title',
        'description',
        'keywords',
        'url',
        'name',
        'text',
        'published',
        'published_at',
        'updated_at',
        'top_menu',
        'footer_menu',

    ];

    public function parent()
    {
        return $this->belongsTo('App\Pages', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Pages', 'parent_id');
    }


}
