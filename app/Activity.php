<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use Illuminate\Support\Facades\Storage;

class Activity extends Model
{
    protected $fillable = ['title', 'description', 'link', 'file', 'start', 'end', 'category_id', 'color', 'txtColor'];

    public function category() {

        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
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

    public function get_saved_file_name(): string
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
    public function delete_file()
    {
        return Storage::delete('/activities/'.$this->get_saved_file_name());
    }
    public function delete()
    {
        $this->delete_file();
        return parent::delete();
    }
    public function update(array $attributes = [], array $options = [])
    {
        if(isset($attributes['file'])){

            $this->delete_file();
        }
        return parent::update($attributes, $options);
    }

    public function remove_t_from_date()
    {
        $start = $this->start;
        $this->start = str_replace("T", " ", $start);
        $end = $this->end;
        $this->end = str_replace("T", " ", $end);
        $this->update();
    }

}
