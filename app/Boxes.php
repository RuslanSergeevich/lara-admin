<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boxes extends Model
{
    protected $fillable = [
        'id',
        'system_name',
        'name',
        'box_text',
        'published',
        'updated_at'
    ];
}
