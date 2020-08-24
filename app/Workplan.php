<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workplan extends Model
{
    protected $fillable = ['title', 'description', 'file', 'professional1', 'professional2', 'start', 'end', 'category_id', 'color', 'txtColor', 'user_id'];

    public function user() {
        return $this->belongs_to('User')->select(array('id', 'first_name', 'last_name', 'email'));
      }
}