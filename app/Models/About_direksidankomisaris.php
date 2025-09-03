<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class About_direksidankomisaris extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'about_direksidankomisaris';
    protected $fillable = ['image', 'image_url', 'name', 'position', 'type', 'description', 'experience', 'position_eng', 'description_eng', 'experience_eng'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()->logOnlyDirty();
    }
}
