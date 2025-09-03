<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Annual_report extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'annualreport';
    protected $fillable = [
        'id_user',
        'title',
        'description',
        'image',
        'image_url',
        'file',
        'file_url',
        'tahun',
        'is_active'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()->logOnlyDirty();
    }
}
