<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    use LogsActivity;

    protected $fillable = [
        'title',
        'content',
        'image',
        'image_url',
        'featured',
        'slug',
        'status',
        'title_eng',
        'content_eng',
        'slug_eng',
        'seo_title',
        'seo_description',
        'seo_title_eng',
        'seo_description_eng',
        'schedule',
        'jenis',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable();
    }
}
