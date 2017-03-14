<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    protected $fillable = [
        'id',
        'title',
        'url',
        'published',
    ];
}
