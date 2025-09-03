<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    public $table = "project";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'kategori_berita_id',
        'judul',
        'judul_en',
        'slug',
        'slug_en',
        'image',
        'deskripsi',
        'deskripsi_en'
    ];
}
