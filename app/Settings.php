<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'id',
        'phone1',
        'phone2',
        'phone3',
        'email',
        'email2',
        'address',
        'copyright',
        'metrika'
    ];
}
