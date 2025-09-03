<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Home_slider;
use App\Models\Home_about;
use App\Models\Home_about_counter;
use App\Models\Home_capability;
use App\Models\Home_client;
use App\Models\News;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class HomepageController extends Controller
{
  /**
   * Get all homepage data
   */
  public function index(): JsonResponse
  {
    try {
      $homepage = [
        'slider' => Home_slider::first(),
        'about' => Home_about::first(),
        'about_counters' => Home_about_counter::all(),
        'title_counter' => Title::where('id', 7)->first(),
        'capabilities' => Home_capability::all(),
        'title_capabilities' => Title::where('id', 1)->first(),
        'clients' => Home_client::all(),
        'title_client' => Title::where('id', 6)->first(),
        'latest_news' => News::where('status', 'published')
          ->orderBy('created_at', 'desc')
          ->take(4)
          ->select('id', 'title', 'title_eng', 'content', 'content_eng', 'image', 'image_url', 'slug', 'slug_eng', 'featured', 'created_at', 'updated_at', 'schedule')
          ->get()
      ];

      return response()->json([
        'success' => true,
        'message' => 'Homepage data retrieved successfully',
        'data' => $homepage
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve homepage data',
        'error' => $e->getMessage()
      ], 500);
    }
  }

  /**
   * Get slider data
   */
  public function getSlider(): JsonResponse
  {
    try {
      $sliders = Home_slider::all();

      return response()->json([
        'success' => true,
        'message' => 'Slider data retrieved successfully',
        'data' => $sliders
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve slider data',
        'error' => $e->getMessage()
      ], 500);
    }
  }

  /**
   * Get about section data
   */
  public function getAbout(): JsonResponse
  {
    try {
      $about = Home_about::all();

      return response()->json([
        'success' => true,
        'message' => 'About data retrieved successfully',
        'data' => $about
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve about data',
        'error' => $e->getMessage()
      ], 500);
    }
  }

  /**
   * Get about counters data
   */
  public function getAboutCounters(): JsonResponse
  {
    try {
      $counters = Home_about_counter::all();

      return response()->json([
        'success' => true,
        'message' => 'About counters data retrieved successfully',
        'data' => $counters
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve about counters data',
        'error' => $e->getMessage()
      ], 500);
    }
  }

  /**
   * Get capabilities data
   */
  public function getCapabilities(): JsonResponse
  {
    try {
      $capabilities = Home_capability::all();

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
   * Get clients data
   */
  public function getClients(): JsonResponse
  {
    try {
      $clients = Home_client::all();

      return response()->json([
        'success' => true,
        'message' => 'Clients data retrieved successfully',
        'data' => $clients
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve clients data',
        'error' => $e->getMessage()
      ], 500);
    }
  }

  /**
   * Get latest news data
   */
  public function getLatestNews(): JsonResponse
  {
    try {
      $news = News::where('status', 'published')
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->select('id', 'title', 'title_eng', 'content', 'content_eng', 'image', 'image_url', 'slug', 'slug_eng', 'featured', 'created_at')
        ->get();

      return response()->json([
        'success' => true,
        'message' => 'Latest news data retrieved successfully',
        'data' => $news
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve latest news data',
        'error' => $e->getMessage()
      ], 500);
    }
  }
}
