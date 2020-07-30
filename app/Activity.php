<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Activity extends Model
{
    protected $fillable = ['name', 'description', 'file', 'professional', 'date', 'time'];

    public function Categories() {

        return $this->belongsTo(Category::class);

    }
}

