<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\JsonResponse;

class FooterController extends Controller
{
  /**
   * Get footer data
   */
  public function index(): JsonResponse
  {
    try {
      $footer = Footer::first();

      if (!$footer) {
        return response()->json([
          'success' => false,
          'message' => 'Footer data not found'
        ], 404);
      }

      return response()->json([
        'success' => true,
        'message' => 'Footer data retrieved successfully',
        'data' => $footer
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve footer data',
        'error' => $e->getMessage()
      ], 500);
    }
  }
}
