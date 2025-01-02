<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Pertanyaan extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'pertanyaan';


    protected $fillable = [
        'id_user',
        'name',
        'email',
        'company',
        'status',
        'phone',
        'subject',
        'message',
        'status',
        'jenis',
        'replied_at',
        'replied_by',
        'reply',
        'reply_attachment',
        'reply_message',
        'reply_subject',

    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()->logOnlyDirty();
    }
}
