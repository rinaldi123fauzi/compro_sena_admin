<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class About extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'about';
    protected $fillable = ['image', 'image_url', 'image2', 'sub_headline', 'main_headline', 'description',  'sub_headline_eng', 'main_headline_eng', 'description_eng', 'background_akhlak'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()->logOnlyDirty();
    }
}
