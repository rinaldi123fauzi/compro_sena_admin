<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class PertanyaanController extends Controller
{
  /**
   * Submit business question (jenis = bisnis)
   */
  public function submitBusiness(Request $request): JsonResponse
  {
    try {
      // Validation rules
      $validator = Validator::make($request->all(), [
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

      // Create new business question
      $pertanyaan = Pertanyaan::create([
        'name' => $request->name,
        'email' => $request->email,
        'company' => $request->company,
        'phone' => $request->phone,
        'subject' => $request->subject,
        'message' => $request->message,
        'jenis' => 'bisnis'
        // Remove status field to use default value
      ]);

      return response()->json([
        'success' => true,
        'message' => 'Business question submitted successfully',
        'data' => $pertanyaan
      ], 201);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to submit business question',
        'error' => $e->getMessage()
      ], 500);
    }
  }

  /**
   * Submit general question (jenis = umum)
   */
  public function submitGeneral(Request $request): JsonResponse
  {
    try {
      // Validation rules
      $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
        'company' => 'nullable|string|max:255', // Optional for general questions
      ]);

      if ($validator->fails()) {
        return response()->json([
          'success' => false,
          'message' => 'Validation failed',
          'errors' => $validator->errors()
        ], 422);
      }

      // Create new general question
      $pertanyaan = Pertanyaan::create([
        'name' => $request->name,
        'email' => $request->email,
        'company' => $request->company,
        'phone' => $request->phone,
        'subject' => $request->subject,
        'message' => $request->message,
        'jenis' => 'umum'
        // Remove status field to use default value
      ]);

      return response()->json([
        'success' => true,
        'message' => 'General question submitted successfully',
        'data' => $pertanyaan
      ], 201);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to submit general question',
        'error' => $e->getMessage()
      ], 500);
    }
  }
}
