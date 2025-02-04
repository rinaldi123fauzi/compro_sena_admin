<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Footer extends Model
{


    use LogsActivity;
    use HasFactory;
    protected $table = 'footer';




    protected $fillable = [
        'nama_pt',
        'alamat_pt',
        'image_member_of',
        'image_subsidiary_of',
        'image_footer',
        'logo_footer',
        'copyright',
        'instagram_link',
        'facebook_link',
        'twitter_link',
        'linkedin_link',
        'youtube_link',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()->logOnlyDirty();
    }
}
