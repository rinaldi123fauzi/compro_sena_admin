<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;

    protected $table = 'title';
    protected $fillable = ['texttitle', 'textsubtitle', 'textdeskripsi', 'texttitle_eng', 'textsubtitle_eng', 'textdeskripsi_eng'];
}
