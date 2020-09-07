<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Team extends Model
{
    protected $fillable = ['first_name','last_name', 'position', 'photo'];

    public function upload_photo($photo)
    {
         $this->photo= $photo->extension();
         $name_photo = $this->get_saved_name_photo();
         $this->save();
         $photo->storeAs('team/', $name_photo, ['disk'=>'public']);
    }

    public function get_photo_url()
    {
        if (! $this->photo) {
            return '../img/avatar-team.jpg';
        }

        return Storage::url('team/' . $this->get_saved_name_photo());
    }


    public function get_saved_name_photo(): string
    {
        return $this->id . '-' . $this->first_name . '.' . $this->photo;
    }
}
