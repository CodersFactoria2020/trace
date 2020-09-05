<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use Illuminate\Support\Facades\Storage;

class Activity extends Model
{
    protected $fillable = ['title', 'description', 'link', 'file', 'start', 'end', 'weekly', 'category_id', 'color', 'txtColor'];

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
        $this->showStart = str_replace("T", " ", $start);
        $end = $this->end;
        $this->showEnd = str_replace("T", " ", $end);
        $this->update();
    }

    public function getWeeklyAttribute($value)
    {
        if ($value === 1)
        {
            return "Sí";
        }
        if ($value === 0)
        {
            return "No";
        }
    }

    public function getCategoryColor()
    {
        $category_id = $this->category_id;
        $category = Category::where('id', $category_id)->first();
        $color = ($category['color']);
        return $color;
    }

    static public function filter_todays_activities($activities)
    {
        foreach ($activities as $activity) {
            $activities->toArray();
            $activity_date = $activity->start;
            $activity_day = substr($activity_date,8,2);
            // dd($activity_day);
            $current_date = date(DATE_ATOM);
            $current_day = substr($current_date,8,2);
            // dd($current_day);
            dd($activities);
            foreach ($activities as $activity) {
                if ($activity_day !== $current_day) {
                    $key = array_search($activity, $activities);
                    // dd($key);
                    unset($activities[$key]); // CHECK INDEX
                    return $activities;
                }
                return $activities;
            }
        }
    }

}
