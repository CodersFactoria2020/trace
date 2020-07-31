<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Team extends Model
{
    protected $fillable = [
        'first_name','last_name', 'position', 'photo'
    ];

    public function upload_photo($photo)
    {
        $name_photo = $this->id . '.jpg';
        $photo->storeAs('team/', $name_photo, ['disk'=>'public']);

    }
    public function get_photo_url()
    {
        Return Storage::url('team/'.$this->id . '.jpg');
    }



}
