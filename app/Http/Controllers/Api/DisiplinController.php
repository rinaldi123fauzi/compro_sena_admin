<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Disiplin;
use Illuminate\Http\JsonResponse;

class DisiplinController extends Controller
{
  /**
   * Get all disiplin data
   */
  public function index(): JsonResponse
  {
    try {
      $disiplin = Disiplin::all();

      return response()->json([
        'success' => true,
        'message' => 'Disiplin data retrieved successfully',
        'data' => $disiplin
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve disiplin data',
        'error' => $e->getMessage()
      ], 500);
    }
  }
}
