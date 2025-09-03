<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\JsonResponse;

class NewsController extends Controller
{
  /**
   * Get all news data
   */
  public function index(): JsonResponse
  {
    try {
      $news = News::orderBy('created_at', 'desc')->get();

      return response()->json([
        'success' => true,
        'message' => 'News data retrieved successfully',
        'data' => $news
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve news data',
        'error' => $e->getMessage()
      ], 500);
    }
  }

  /**
   * Get news detail by slug
   */
  public function show($slug): JsonResponse
  {
    try {
      $news = News::where('slug', $slug)->first();

      if (!$news) {
        return response()->json([
          'success' => false,
          'message' => 'News not found'
        ], 404);
      }

      return response()->json([
        'success' => true,
        'message' => 'News detail retrieved successfully',
        'data' => $news
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve news detail',
        'error' => $e->getMessage()
      ], 500);
    }
  }
}
