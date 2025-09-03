<?php
require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Testing Home Slider Table Structure ===\n";

try {
  // Test if we can describe the table
  $columns = DB::select('DESCRIBE home_slider');
  echo "Current columns in home_slider table:\n";
  foreach ($columns as $column) {
    echo "- {$column->Field} ({$column->Type})\n";
  }

  echo "\n=== Testing Model ===\n";
  $slider = new App\Models\Home_slider();
  echo "Fillable fields: " . implode(', ', $slider->getFillable()) . "\n";

  echo "\n=== Testing Insert ===\n";
  $test = App\Models\Home_slider::create([
    'primary_text' => 'Test Primary Text',
    'primary_text_eng' => 'Test Primary Text EN',
    'description' => 'Test Description',
    'description_eng' => 'Test Description EN',
    'file_video' => null,
    'url_video' => 'https://example.com/video.mp4'
  ]);

  echo "SUCCESS: Test record created with ID: " . $test->id . "\n";

  // Clean up
  $test->delete();
  echo "Test record deleted.\n";
} catch (Exception $e) {
  echo "ERROR: " . $e->getMessage() . "\n";
}
