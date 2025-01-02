<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class About_akhlak extends Model
{
    use LogsActivity;
    use HasFactory;
    protected $table = 'about_akhlak';
    protected $fillable = ['image1', 'image2', 'image3'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable();
    }
}
