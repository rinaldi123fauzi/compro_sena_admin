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
        'slug',
        'status',
        'title_en',
        'content_en',
        'slug_en',
        'seo_title',
        'seo_description',
        'seo_title_en',
        'seo_description_en',
        'schedule',
        'jenis',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable();
    }
}
