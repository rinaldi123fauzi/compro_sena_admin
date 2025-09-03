<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capability extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'icon',
        'icon_url',
        'description'
    ];

    public function layanans()
    {
        return $this->hasMany(Layanan::class);
    }

    /**
     * Get projects that match this capability's title with project type
     * Uses custom query since there's no capability_id in projects table
     * Maps capability titles to project types:
     * - 'Engineering' → 'engineering'
     * - 'Inspection Service' → 'inspection'
     * - 'Survey Service' → 'survey'
     * - 'Consultant Service' → 'consultant'
     */
    public function projects()
    {
        $typeMapping = [
            'Engineering' => 'engineering',
            'Inspection Service' => 'inspection',
            'Survey Service' => 'survey',
            'Consultant Service' => 'consultant'
        ];

        $projectType = $typeMapping[$this->title] ?? strtolower(str_replace(' Service', '', $this->title));

        return $this->newQuery()
            ->from('project')
            ->where('type', $projectType)
            ->select('*');
    }

    /**
     * Get projects as a proper relationship for eager loading
     */
    public function projectsRelation()
    {
        $typeMapping = [
            'Engineering' => 'engineering',
            'Inspection Service' => 'inspection',
            'Survey Service' => 'survey',
            'Consultant Service' => 'consultant'
        ];

        $projectType = $typeMapping[$this->title] ?? strtolower(str_replace(' Service', '', $this->title));

        // Return a HasMany-like relationship but using custom logic
        return Project::where('type', $projectType);
    }

    /**
     * Get the project type that corresponds to this capability
     */
    public function getProjectTypeAttribute()
    {
        $typeMapping = [
            'Engineering' => 'engineering',
            'Inspection Service' => 'inspection',
            'Survey Service' => 'survey',
            'Consultant Service' => 'consultant'
        ];

        return $typeMapping[$this->title] ?? strtolower($this->title);
    }
}
