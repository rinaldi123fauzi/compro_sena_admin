<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Home_slider extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'home_slider';
    protected $fillable = ['primary_text', 'primary_text_eng', 'description', 'description_eng', 'file_video', 'url_video'];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()->logOnlyDirty();
    }

    /**
     * Get primary text with optional plain text processing
     */
    public function getPrimaryTextAttribute($value)
    {
        return $value;
    }

    /**
     * Get primary text as plain text (without HTML wrapper tags)
     */
    public function getPrimaryTextPlainAttribute()
    {
        return $this->stripSimpleWrapper($this->primary_text);
    }

    /**
     * Get description as plain text (without HTML wrapper tags)
     */
    public function getDescriptionPlainAttribute()
    {
        return $this->stripSimpleWrapper($this->description);
    }

    /**
     * Get primary text english as plain text
     */
    public function getPrimaryTextEngPlainAttribute()
    {
        return $this->stripSimpleWrapper($this->primary_text_eng);
    }

    /**
     * Get description english as plain text
     */
    public function getDescriptionEngPlainAttribute()
    {
        return $this->stripSimpleWrapper($this->description_eng);
    }

    /**
     * Strip simple wrapper tags from content
     */
    protected function stripSimpleWrapper($content)
    {
        if (empty($content)) {
            return $content;
        }

        $trimmed = trim($content);

        // Remove simple div wrapper with no classes or attributes
        if (preg_match('/^<div[^>]*>([^<]+)<\/div>$/s', $trimmed, $matches)) {
            return $matches[1];
        }

        // Remove div with plain-text class
        if (preg_match('/^<div[^>]*class="plain-text"[^>]*>(.*?)<\/div>$/s', $trimmed, $matches)) {
            return $matches[1];
        }

        return $content;
    }
}
