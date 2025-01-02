<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Home_about extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'home_about';
    protected $fillable = ['image', 'link_video', 'sub_headline', 'main_headline', 'description', 'link_video_eng', 'sub_headline_eng', 'main_headline_eng', 'description_eng'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()->logOnlyDirty();
    }
}
