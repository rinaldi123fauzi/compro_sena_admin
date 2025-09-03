<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftwareHardware extends Model
{
    use HasFactory;

    protected $table = 'software_hardwares';

    protected $fillable = [
        'title',
        'image',
        'image_url',
        'type'
    ];
}
