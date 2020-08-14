<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'description', 'professional1', 'professional2', 'start', 'end', 'category_id'];

    public function getCategoryIdAttribute($value)
    {
        if ($value === 1)
        {
            $background_color = "#84c9e6"; // light blue
            return $background_color;
        }
        if ($value === 2)
        {
            $background_color = "#ebf556"; // yellow
            return $background_color;
        }
        if ($value === 3)
        {
            $background_color = "#af8abc"; // purple
            return $background_color;
        }
        if ($value === 4)
        {
            $background_color = "#ff9a4d"; // orange
            return $background_color;
        }
        if ($value === 5)
        {
            $background_color = "#f9cdda"; // pink
            return $background_color;
        }
        if ($value === 6)
        {
            $background_color = "#35f631"; // green
            return $background_color;
        }
    }
}