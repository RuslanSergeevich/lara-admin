<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boxes extends Model
{
    protected $fillable = [
        'id',
        'system_name',
        'name',
        'text',
        'published',
        'updated_at'
    ];
}
