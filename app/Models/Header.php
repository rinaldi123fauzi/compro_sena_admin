<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Header extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'header';

    protected $fillable = [
        'logo',
        'logo_url',
        'header_about_us_image',
        'header_about_us_image_url',
        'header_about_us_text',
        'header_about_us_text_en',

        'header_capability_image',
        'header_capability_image_url',
        'header_capability_text',
        'header_capability_text_en',

        'header_experience_image',
        'header_experience_image_url',
        'header_experience_text',
        'header_experience_text_en',

        'header_contact_us_image',
        'header_contact_us_image_url',
        'header_contact_us_text',
        'header_contact_us_text_en',

        'header_mediainvestor_image',
        'header_mediainvestor_image_url',
        'header_mediainvestor_text',

        'header_news_image',
        'header_news_image_url',
        'header_news_text',

        'header_annualreport_image',
        'header_annualreport_image_url',
        'header_annualreport_text',
    ];





    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()->logOnlyDirty();
    }
}
