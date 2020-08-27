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
         $this->photo= $photo->extension();
         $name_photo = $this->id .'-'. $this->first_name . '.' . $this->photo;
         $this->save();
         $photo->storeAs('team/', $name_photo, ['disk'=>'public']);
    }

    public function get_photo_url()
    {
        if (! $this->photo) {
            return '../img/avatar-team.jpg';
        }
        return Storage::url('team/' .$this->id .'-'. $this->first_name . '.' . $this->photo);
    }



}
