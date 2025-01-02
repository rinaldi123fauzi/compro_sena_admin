<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Visimisi extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'about_visimisi';
    protected $fillable = ['headline', 'visi_title', 'visi_description', 'misi_title', 'misi_description'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable();
    }
}
