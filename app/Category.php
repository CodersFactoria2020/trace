<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Activity;

class Category extends Model
{
    protected $fillable = ['category_name', 'description', 'category_color']; 

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}