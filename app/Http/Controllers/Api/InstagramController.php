<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Instagram;
use Illuminate\Http\JsonResponse;

class InstagramController extends Controller
{
  /**
   * Get 3 latest Instagram posts
   *
   * @return JsonResponse
   */
  public function index(): JsonResponse
  {
    try {
      $instagrams = Instagram::orderBy('tanggal_posting', 'desc')
        ->take(3)
        ->get([
          'id',
          'image',
          'image_url',
          'caption',
          'tanggal_posting',
          'url'
        ]);

      return response()->json([
        'success' => true,
        'message' => 'Instagram data retrieved successfully',
        'data' => $instagrams
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve Instagram data',
        'error' => $e->getMessage()
      ], 500);
    }
  }
}
