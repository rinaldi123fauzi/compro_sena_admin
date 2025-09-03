<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SearchController extends Controller
{
  /**
   * Search for news and projects based on query
   */
  public function search(Request $request): JsonResponse
  {
    try {
      $query = $request->get('q');

      if (!$query) {
        return response()->json([
          'success' => false,
          'message' => 'Search query is required'
        ], 400);
      }

      // Search in News
      $news = News::where(function ($q) use ($query) {
        $q->where('title', 'LIKE', "%{$query}%")
          ->orWhere('content', 'LIKE', "%{$query}%")
          ->orWhere('title_eng', 'LIKE', "%{$query}%")
          ->orWhere('content_eng', 'LIKE', "%{$query}%");
      })
        ->where('status', 'published')
        ->orderBy('created_at', 'desc')
        ->get();

      // Search in Projects
      $projects = Project::where(function ($q) use ($query) {
        $q->where('name', 'LIKE', "%{$query}%")
          ->orWhere('description', 'LIKE', "%{$query}%")
          ->orWhere('description_eng', 'LIKE', "%{$query}%")
          ->orWhere('client', 'LIKE', "%{$query}%")
          ->orWhere('location', 'LIKE', "%{$query}%")
          ->orWhere('type', 'LIKE', "%{$query}%")
          ->orWhere('sektor', 'LIKE', "%{$query}%");
      })
        ->orderBy('year', 'desc')
        ->get();

      $searchResults = [
        'query' => $query,
        'total_results' => $news->count() + $projects->count(),
        'news' => [
          'count' => $news->count(),
          'data' => $news
        ],
        'projects' => [
          'count' => $projects->count(),
          'data' => $projects
        ]
      ];

      return response()->json([
        'success' => true,
        'message' => 'Search completed successfully',
        'data' => $searchResults
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Search failed',
        'error' => $e->getMessage()
      ], 500);
    }
  }
}
