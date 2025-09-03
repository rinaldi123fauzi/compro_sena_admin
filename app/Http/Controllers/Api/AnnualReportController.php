<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Annual_report;
use App\Models\Annual_report_pertanyaan;
use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class AnnualReportController extends Controller
{
  /**
   * Get all annual reports with hero section
   */
  public function index(): JsonResponse
  {
    try {
      // Get header annual report data for hero section
      $headerAnnualReport = Header::select('header_annualreport_image', 'header_annualreport_image_url', 'header_annualreport_text')->first();

      // Get all active annual reports ordered by year descending
      $annualReports = Annual_report::where('is_active', 1)
        ->orderBy('tahun', 'desc')
        ->get();

      $annualReportData = [
        'hero_section' => $headerAnnualReport,
        'annual_reports' => $annualReports
      ];

      return response()->json([
        'success' => true,
        'message' => 'Annual reports retrieved successfully',
        'data' => $annualReportData
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve annual reports',
        'error' => $e->getMessage()
      ], 500);
    }
  }

  /**
   * Submit annual report question
   */
  public function submitQuestion(Request $request): JsonResponse
  {
    try {
      // Validation rules
      $validator = Validator::make($request->all(), [
        'id_annualreport' => 'required|integer|exists:annualreport,id',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'company' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
      ]);

      if ($validator->fails()) {
        return response()->json([
          'success' => false,
          'message' => 'Validation failed',
          'errors' => $validator->errors()
        ], 422);
      }

      // Create new annual report question
      $question = Annual_report_pertanyaan::create([
        'id_annualreport' => $request->id_annualreport,
        'name' => $request->name,
        'email' => $request->email,
        'company' => $request->company,
        'phone' => $request->phone,
        'subject' => $request->subject,
        'message' => $request->message
        // Remove status field to use default value
      ]);

      return response()->json([
        'success' => true,
        'message' => 'Annual report question submitted successfully',
        'data' => $question
      ], 201);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to submit annual report question',
        'error' => $e->getMessage()
      ], 500);
    }
  }
}
