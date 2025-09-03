<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Project extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'project';
    protected $fillable = ['name', 'name_eng', 'client', 'location', 'image', 'image_url', 'description', 'description_eng', 'year', 'type', 'lat', 'lng', 'turunanbisnis', 'software', 'sektor'];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()->logOnlyDirty();
    }

    /**
     * Get the capability that matches this project's type
     * Uses custom query since there's no capability_id field
     * Maps project types to capability titles:
     * - 'engineering' → 'Engineering'
     * - 'inspection' → 'Inspection Service'
     * - 'survey' → 'Survey Service'
     * - 'consultant' → 'Consultant Service'
     */
    public function capability()
    {
        $titleMapping = [
            'engineering' => 'Engineering',
            'inspection' => 'Inspection Service',
            'survey' => 'Survey Service',
            'consultant' => 'Consultant Service'
        ];

        $capabilityTitle = $titleMapping[$this->type] ?? ucfirst($this->type);

        return Capability::where('title', $capabilityTitle)->first();
    }

    /**
     * Get capability as a relationship (for eager loading)
     */
    public function capabilityRelation()
    {
        // This won't work with standard eager loading, but we can use it for manual queries
        return $this->belongsTo(Capability::class, null, null)->where(function ($query) {
            $titleMapping = [
                'engineering' => 'Engineering',
                'inspection' => 'Inspection Service',
                'survey' => 'Survey Service',
                'consultant' => 'Consultant Service'
            ];

            $capabilityTitle = $titleMapping[$this->type] ?? ucfirst($this->type);
            $query->where('title', $capabilityTitle);
        });
    }
}
