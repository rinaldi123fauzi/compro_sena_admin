<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\HighlightProject;
use App\Models\Header;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
  /**
   * Get all project data with hero section and map
   */
  public function index(): JsonResponse
  {
    try {
      // Get header experience data for hero section
      $headerExperience = Header::select('header_experience_image', 'header_experience_image_url', 'header_experience_text', 'header_experience_text_eng')->first();

      // Get all highlight projects for map
      $highlightProjects = HighlightProject::all();

      // Get all projects
      $projects = Project::orderBy('year', 'desc')->get();

      $projectData = [
        'hero_section' => $headerExperience,
        'map' => $highlightProjects,
        'projects' => $projects
      ];

      return response()->json([
        'success' => true,
        'message' => 'Project data retrieved successfully',
        'data' => $projectData
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve project data',
        'error' => $e->getMessage()
      ], 500);
    }
  }

  /**
   * Get project detail by ID
   */
  public function show($id): JsonResponse
  {
    try {
      $project = Project::find($id);

      if (!$project) {
        return response()->json([
          'success' => false,
          'message' => 'Project not found'
        ], 404);
      }

      return response()->json([
        'success' => true,
        'message' => 'Project detail retrieved successfully',
        'data' => $project
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve project detail',
        'error' => $e->getMessage()
      ], 500);
    }
  }
}
