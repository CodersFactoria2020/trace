<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['title', 'description', 'file', 'professional1', 'professional2', 'start', 'end', 'category_id', 'color', 'txtColor'];
    
    public function User()
    {
        return $this->hasMany(User::class);
    }

    public function getCategoryIdAttribute($value)
    {
        if ($value === 1)
        {
            return "Fisioteràpia neurològica";
        }
        if ($value === 2)
        {
            return "Neurologopèdia";
        }
        if ($value === 3)
        {
            return "Teràpia ocupacional";
        }
        if ($value === 4)
        {
            return "Teràpia ocupacional";
            if ($value === 5)
        {
            return "GNPT i NEURONUP";
        }
        if ($value === 6)
        {
            return "Grupals";
        }
    }
}
}