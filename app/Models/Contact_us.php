<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class Contact_us extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'contact_us';
    protected $fillable = [
        'ho_city',
        'ho_address',
        'ho_phone',
        'ho_email',
        'ho_linkmap',
        'featured_image',
        'map',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()->logOnlyDirty();
    }
}
