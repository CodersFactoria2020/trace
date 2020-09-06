<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

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

    static public function replace_start_date_with_weekday_name($activities)
    {
        foreach($activities as $activity)
        {
            $activity->showStart = substr($activity->showStart, 11);
            $activity->start = Carbon::parse($activity->start)->isoFormat('dddd' . ' ' . 'HH' .  ':' . 'mm' );
        }
        $activities = $activities->sortBy('showStart');
        $activities->values()->all();
        return $activities;
    }

    static public function filter_todays_activities_at_any_day_of_year($activities)
    {
        $todays_activities = [];
        $current_day_week = Carbon::now()->dayOfWeek;
        $current_date = Carbon::now();
        foreach ($activities as $activity) {
            $activity_date = $activity->start;
            $activity_day_week = Carbon::parse($activity_date)->dayOfWeek;
            if ($activity_day_week == $current_day_week && $activity->weekly == 'Sí')
            {
                array_push($todays_activities, $activity);
            }
            
            if ($current_date->format('Y-m-d') == Carbon::parse($activity_date)->format('Y-m-d') && $activity->weekly == 'No')
            {
                array_push($todays_activities, $activity);
            }
        }
        $todays_activities = collect($todays_activities);
        return $todays_activities;
    }

    static public function filter_activities_by_day($activities, $day)
    {
        $day_activities = [];
        foreach ($activities as $activity)
        {
            if (Carbon::parse($activity->start)->dayOfWeek == $day) {
                array_push($day_activities, $activity);
            }
        }
        $day_activities = collect($day_activities);
        return $day_activities;
    }
}
