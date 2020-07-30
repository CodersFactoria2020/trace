<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'first_name','last_name', 'position', 'photo'
    ];


}
