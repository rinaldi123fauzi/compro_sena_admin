<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomepageController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\PertanyaanController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\AnnualReportController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\SoftwareHardwareController;
use App\Http\Controllers\Api\DisiplinController;
use App\Http\Controllers\Api\FooterController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\InstagramController;
use App\Http\Controllers\Api\CapabilityController;

use App\Http\Controllers\Api\HeaderApiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('api')->group(function () {
  // Homepage API Routes - Read Only
  Route::prefix('homepage')->group(function () {

    // Get all homepage data
    Route::get('/', [HomepageController::class, 'index']);



    // Get specific section data
    Route::get('/slider', [HomepageController::class, 'getSlider']);
    Route::get('/about', [HomepageController::class, 'getAbout']);
    Route::get('/about-counters', [HomepageController::class, 'getAboutCounters']);
    Route::get('/capabilities', [HomepageController::class, 'getCapabilities']);
    Route::get('/clients', [HomepageController::class, 'getClients']);
    Route::get('/latest-news', [HomepageController::class, 'getLatestNews']);
  });


  Route::get('/header', [HeaderApiController::class, 'show']);
  // About Page API Routes - Read Only
  Route::prefix('about')->group(function () {

    // Get all about page data
    Route::get('/', [AboutController::class, 'index']);

    // Get specific section data
    Route::get('/about', [AboutController::class, 'getAbout']);
    Route::get('/visimisi', [AboutController::class, 'getVisimisi']);
    Route::get('/akhlak', [AboutController::class, 'getAkhlak']);
    Route::get('/direksi-komisaris', [AboutController::class, 'getDireksiKomisaris']);
    Route::get('/piagam', [AboutController::class, 'getPiagam']);
    Route::get('/kebijakan-komitmen', [AboutController::class, 'getKebijakanKomitmen']);
    Route::get('/header-about-us', [AboutController::class, 'getHeaderAboutUs']);
  });

  // News API Routes - Read Only
  Route::prefix('news')->group(function () {

    // Get all news
    Route::get('/', [NewsController::class, 'index']);

    // Get news detail by slug
    Route::get('/{slug}', [NewsController::class, 'show']);
  });

  // Pertanyaan API Routes - Write Only
  Route::prefix('pertanyaan')->group(function () {

    // Submit business question
    Route::post('/bisnis', [PertanyaanController::class, 'submitBusiness']);

    // Submit general question
    Route::post('/umum', [PertanyaanController::class, 'submitGeneral']);
  });

  // Contact Us API Routes - Read Only
  Route::prefix('contact-us')->group(function () {

    // Get contact us data
    Route::get('/', [ContactUsController::class, 'index']);
  });

  // Annual Report API Routes
  Route::prefix('annual-report')->group(function () {

    // Get all annual reports
    Route::get('/', [AnnualReportController::class, 'index']);

    // Submit annual report question
    Route::post('/question', [AnnualReportController::class, 'submitQuestion']);
  });

  // Project API Routes - Read Only
  Route::prefix('project')->group(function () {

    // Get all project data with hero section and map
    Route::get('/', [ProjectController::class, 'index']);

    // Get project detail by ID
    Route::get('/{id}', [ProjectController::class, 'show']);
  });

  // Software Hardware API Routes - Read Only
  Route::prefix('software-hardware')->group(function () {

    // Get software and hardware data with limit (14 each)
    Route::get('/', [SoftwareHardwareController::class, 'index']);

    // Get all software and hardware data without limit
    Route::get('/all', [SoftwareHardwareController::class, 'all']);
  });

  // Disiplin API Routes - Read Only
  Route::prefix('disiplin')->group(function () {

    // Get all disiplin data
    Route::get('/', [DisiplinController::class, 'index']);
  });

  // Footer API Routes - Read Only
  Route::prefix('footer')->group(function () {

    // Get footer data
    Route::get('/', [FooterController::class, 'index']);
  });

  // Search API Routes - Read Only
  Route::get('/search', [SearchController::class, 'search']);

  // Capability API Routes - Read Only
  Route::prefix('capability')->group(function () {

    // Get all capabilities with their layanans
    Route::get('/', [CapabilityController::class, 'index']);

    // Get specific capability with its layanans
    Route::get('/{id}', [CapabilityController::class, 'show']);
  });

  // Instagram API Routes - Read Only
  Route::prefix('instagram')->group(function () {

    // Get 3 latest instagram posts
    Route::get('/', [InstagramController::class, 'index']);
  });
});
