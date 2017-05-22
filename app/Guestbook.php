<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guestbook extends Model
{
    protected $fillable = [
        'name',
        'email',
        'text',
        'answer_text',
        'published',
        'published_at',
        'updated_at'
    ];
}
