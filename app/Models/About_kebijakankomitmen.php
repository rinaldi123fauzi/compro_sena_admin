<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class About_kebijakankomitmen extends Model
{
  use HasFactory;
  use LogsActivity;

  protected $table = 'about_komitmenkebijakan';
  protected $fillable = ['image', 'image_url', 'title', 'title_eng', 'kategori'];

  public function getActivitylogOptions(): LogOptions
  {
    return LogOptions::defaults()
      ->logFillable()->logOnlyDirty();
  }
}
