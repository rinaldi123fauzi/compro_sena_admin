<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutus_image_slider extends Model
{
    use HasFactory;

    protected $table = 'about_us_image_slider';
    protected $fillable = ['image', 'title'];
}
