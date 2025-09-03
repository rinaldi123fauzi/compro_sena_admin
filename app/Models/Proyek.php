<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;
    public $table = "proyek";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'kodeproyek',
        'projectid',
        'vendorid',
        'regionalid',
        'opr',
        'ring',
        'sonumb',
        'siteid',
        'sitename',
        'spknomor',
        'spkremark',
        'ponomor',
        'potanggal',
        'nilaipo',
        'statusproyek',
    ];
}
