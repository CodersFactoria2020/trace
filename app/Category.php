<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Activity;

class Category extends Model
{
    protected $fillable = ['category_name', 'description']; 

    public function activities()
    {
        return $this->hasMany(ACtivity::class);
    }
}