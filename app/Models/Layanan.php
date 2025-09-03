<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'capability_id',
        'title',
        'description',
        'type'
    ];

    public function capability()
    {
        return $this->belongsTo(Capability::class);
    }
}
