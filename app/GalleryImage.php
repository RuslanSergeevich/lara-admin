<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{

    protected $table = 'gallery_image';

    protected $fillable = [
        'id',
        'parent_id',
        'title',
        'alt',
        'img',
        'published'
    ];

}
