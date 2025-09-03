<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SoftwareHardware;
use Illuminate\Http\JsonResponse;
use App\Models\Title;

class SoftwareHardwareController extends Controller
{
  /**
   * Get software and hardware data with limit (14 each)
   */
  public function index(): JsonResponse
  {
    try {
      // Get software (type = 'software') with limit 14
      $software = SoftwareHardware::where('type', 'software')
        ->take(14)
        ->get();

      // Get tools/hardware (type = 'hardware') with limit 14
      $tools = SoftwareHardware::where('type', 'hardware')
        ->take(14)
        ->get();

      $titleSoftware = Title::where('id', 10)->first();
      $titleHardware = Title::where('id', 11)->first();

      $softwareHardwareData = [
        'software' => $software,
        'tools' => $tools,
        'title_software' => $titleSoftware,
        'title_hardware' => $titleHardware
      ];

      return response()->json([
        'success' => true,
        'message' => 'Software and hardware data retrieved successfully',
        'data' => $softwareHardwareData
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve software and hardware data',
        'error' => $e->getMessage()
      ], 500);
    }
  }

  /**
   * Get all software and hardware data without limit
   */
  public function all(): JsonResponse
  {
    try {
      // Get all software (type = 'software') without limit
      $software = SoftwareHardware::where('type', 'software')->get();

      // Get all tools/hardware (type = 'hardware') without limit
      $tools = SoftwareHardware::where('type', 'hardware')->get();

      $softwareHardwareData = [
        'software' => $software,
        'tools' => $tools
      ];

      return response()->json([
        'success' => true,
        'message' => 'All software and hardware data retrieved successfully',
        'data' => $softwareHardwareData
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve all software and hardware data',
        'error' => $e->getMessage()
      ], 500);
    }
  }
}
