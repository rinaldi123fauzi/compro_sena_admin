<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Capability;
use App\Models\Header;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

class CapabilityController extends Controller
{
  /**
   * Get all capabilities with their related layanans
   *
   * @return JsonResponse
   */
  public function index(): JsonResponse
  {
    try {







      $capabilities = Capability::with([
        'layanans' => function ($query) {
          $query->select('id', 'capability_id', 'title', 'description', 'type');
        }
      ])
        ->select('id', 'title', 'icon', 'icon_url', 'description')
        ->get();

      // Manually attach projects to each capability
      $capabilities->each(function ($capability) {
        $typeMapping = [
          'Engineering' => 'engineering',
          'Inspection Service' => 'inspection',
          'Survey Service' => 'survey',
          'Consultant Service' => 'consultant'
        ];

        $projectType = $typeMapping[$capability->title] ?? strtolower(str_replace(' Service', '', $capability->title));

        $capability->projects = Project::where('type', $projectType)
          ->select('id', 'name', 'client', 'location', 'image', 'image_url', 'description', 'year', 'type', 'lat', 'lng')
          ->get();
      });

      return response()->json([
        'success' => true,
        'message' => 'Capabilities data retrieved successfully',
        'data' => $capabilities
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve capabilities data',
        'error' => $e->getMessage()
      ], 500);
    }
  }

  /**
   * Get specific capability with its related layanans
   *
   * @param int $id
   * @return JsonResponse
   */
  public function show($id): JsonResponse
  {
    try {
      $capability = Capability::with([
        'layanans' => function ($query) {
          $query->select('id', 'capability_id', 'title', 'description', 'type');
        }
      ])
        ->select('id', 'title', 'icon', 'icon_url', 'description')
        ->findOrFail($id);

      // Manually attach projects to the capability
      $typeMapping = [
        'Engineering' => 'engineering',
        'Inspection Service' => 'inspection',
        'Survey Service' => 'survey',
        'Consultant Service' => 'consultant'
      ];

      $projectType = $typeMapping[$capability->title] ?? strtolower(str_replace(' Service', '', $capability->title));

      $capability->projects = Project::where('type', $projectType)
        ->select('id', 'name', 'client', 'location', 'image', 'image_url', 'description', 'year', 'type', 'lat', 'lng')
        ->get();

      return response()->json([
        'success' => true,
        'message' => 'Capability data retrieved successfully',
        'data' => $capability
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Capability not found',
        'error' => $e->getMessage()
      ], 404);
    }
  }
}
