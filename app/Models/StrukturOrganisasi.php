<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
  use HasFactory;

  protected $table = 'struktur_organisasi';

  protected $fillable = [
    'title',
    'title_eng',
    'description',
    'description_eng',
    'image',
    'image_eng',
    'image_url',
    'image_eng_url',
  ];
}
