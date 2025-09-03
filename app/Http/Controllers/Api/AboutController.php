<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Visimisi;
use App\Models\About_akhlak;
use App\Models\About_direksidankomisaris;
use App\Models\About_piagam;
use App\Models\About_kebijakankomitmen;
use App\Models\Header;
use Illuminate\Http\JsonResponse;
use App\Models\Title;

class AboutController extends Controller
{
  /**
   * Get all about page data
   */
  public function index(): JsonResponse
  {
    try {
      // Get header about us data
      $headerData = Header::select('header_about_us_image', 'header_about_us_image_url', 'header_about_us_text')->first();

      $aboutPage = [
        'herosection' => $headerData,
        'about' => About::first(),
        'visimisi' => Visimisi::first(),
        'akhlak' => About_akhlak::all(),
        'direksi_komisaris' => About_direksidankomisaris::all(),
        'piagam' => About_piagam::orderBy('created_at', 'desc')->take(5)->get(),
        'kebijakan_komitmen' => About_kebijakankomitmen::orderBy('created_at', 'desc')->take(5)->get(),
        'title_company_value' => Title::where('id', 2)->first(),
        'title_executive' => Title::where('id', 8)->first(),
        'title_sertifikasi' => Title::where('id', 3)->first(),
        'title_komitmen' => Title::where('id', 9)->first(),

      ];

      return response()->json([
        'success' => true,
        'message' => 'About page data retrieved successfully',
        'data' => $aboutPage
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve about page data',
        'error' => $e->getMessage()
      ], 500);
    }
  }

  /**
   * Get about data
   */
  public function getAbout(): JsonResponse
  {
    try {
      $about = About::all();

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
   * Get visi misi data
   */
  public function getVisimisi(): JsonResponse
  {
    try {
      $visimisi = Visimisi::all();

      return response()->json([
        'success' => true,
        'message' => 'Visi misi data retrieved successfully',
        'data' => $visimisi
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve visi misi data',
        'error' => $e->getMessage()
      ], 500);
    }
  }

  /**
   * Get akhlak data
   */
  public function getAkhlak(): JsonResponse
  {
    try {
      $akhlak = About_akhlak::all();

      return response()->json([
        'success' => true,
        'message' => 'Akhlak data retrieved successfully',
        'data' => $akhlak
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve akhlak data',
        'error' => $e->getMessage()
      ], 500);
    }
  }

  /**
   * Get direksi dan komisaris data
   */
  public function getDireksiKomisaris(): JsonResponse
  {
    try {
      $direksiKomisaris = About_direksidankomisaris::all();

      return response()->json([
        'success' => true,
        'message' => 'Direksi dan komisaris data retrieved successfully',
        'data' => $direksiKomisaris
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve direksi dan komisaris data',
        'error' => $e->getMessage()
      ], 500);
    }
  }

  /**
   * Get latest piagam data (5 latest)
   */
  public function getPiagam(): JsonResponse
  {
    try {
      $piagam = About_piagam::orderBy('created_at', 'desc')->get();

      return response()->json([
        'success' => true,
        'message' => 'Piagam data retrieved successfully (5 latest)',
        'data' => $piagam
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve piagam data',
        'error' => $e->getMessage()
      ], 500);
    }
  }

  /**
   * Get latest kebijakan komitmen data (5 latest)
   */
  public function getKebijakanKomitmen(): JsonResponse
  {
    try {
      $kebijakanKomitmen = About_kebijakankomitmen::orderBy('created_at', 'desc')->take(1000)->get();

      return response()->json([
        'success' => true,
        'message' => 'Kebijakan komitmen data retrieved successfully (5 latest)',
        'data' => $kebijakanKomitmen
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve kebijakan komitmen data',
        'error' => $e->getMessage()
      ], 500);
    }
  }

  /**
   * Get header about us data
   */
  public function getHeaderAboutUs(): JsonResponse
  {
    try {
      $headerAboutUs = Header::select('header_about_us_image', 'header_about_us_image_url', 'header_about_us_text')->first();

      return response()->json([
        'success' => true,
        'message' => 'Header about us data retrieved successfully',
        'data' => $headerAboutUs
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve header about us data',
        'error' => $e->getMessage()
      ], 500);
    }
  }
}
