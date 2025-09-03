<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact_us;
use App\Models\Header;
use Illuminate\Http\JsonResponse;
use App\Models\Title;

class ContactUsController extends Controller
{
  /**
   * Get contact us data
   */
  public function index(): JsonResponse
  {
    try {
      $contactUs = Contact_us::first();

      if (!$contactUs) {
        return response()->json([
          'success' => false,
          'message' => 'Contact us data not found'
        ], 404);
      }

      // Get header contact us data for hero section
      $headerContactUs = Header::select('header_contact_us_image', 'header_contact_us_image_url', 'header_contact_us_text', 'header_contact_us_text_eng')->first();

      $title_contact = Title::where('id', 12)->first();


      $contactUsData = [
        'hero_section' => $headerContactUs,
        'contact_info' => $contactUs,
        'title_contact' => $title_contact
      ];

      return response()->json([
        'success' => true,
        'message' => 'Contact us data retrieved successfully',
        'data' => $contactUsData
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve contact us data',
        'error' => $e->getMessage()
      ], 500);
    }
  }
}
