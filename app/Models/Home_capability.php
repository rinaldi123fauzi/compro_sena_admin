<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Home_capability extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'home_capability';
    protected $fillable = ['image', 'title', 'description', 'title_eng', 'description_eng'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()->logOnlyDirty();
    }
}
