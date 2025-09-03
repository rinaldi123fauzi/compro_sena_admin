<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Home_about_counter extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'home_about_counter';
    protected $fillable = ['number', 'prefix', 'suffix', 'title', 'title_eng'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()->logOnlyDirty();
    }
}
