<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Annual_report_pertanyaan extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'annualreport_pertanyaan';

    protected $fillable = [
        'id_annualreport',
        'name',
        'email',
        'company',
        'phone',
        'subject',
        'message',
        'status',
        'replied_at',
        'replied_by',
        'reply',
        'reply_attachment',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()->logOnlyDirty();
    }
}
