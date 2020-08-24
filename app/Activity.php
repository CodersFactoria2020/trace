<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use Illuminate\Support\Facades\Storage;

class Activity extends Model
{
    protected $fillable = ['title', 'description', 'file', 'professional1', 'professional2', 'start', 'end', 'category_id', 'color', 'txtColor'];

    public function Categories() {

        return $this->belongsTo(Category::class);

    }

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
        }
        if ($value === 5)
        {
            return "GNPT i NEURONUP";
        }
        if ($value === 6)
        {
            return "Grupals";
        }
    }

    public function upload_file($file)
    {
        $this->file = $file->extension();
        $this->save();
        $file_name = $this->get_saved_file_name();
        $file->storeAs('activities/', $file_name);
    }
    public function download_file()
    {
        return Storage::download('/activities/'.$this->get_saved_file_name(), $this->get_downloaded_file_name());
    }

    private function get_saved_file_name(): string
    {
        return $this->id . '.' . $this->file;
    }

    public function get_downloaded_file_name(): string
    {
        return $this->title . '.' . $this->file;
    }
    public function has_file()
    {
        return Storage::exists('/activities/'.$this->get_saved_file_name());
    }

}
