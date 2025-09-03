<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Header;
use Illuminate\Http\Response;

class HeaderApiController extends Controller
{
  /**
   * Display the header row with id=1.
   */
  public function show()
  {
    $header = Header::find(1);
    if (!$header) {
      return response()->json(['error' => 'Header not found'], 404);
    }
    return response()->json($header);
  }
}
