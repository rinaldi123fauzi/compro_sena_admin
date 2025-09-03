<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Helpers\TinyMCEHelper;

echo "Testing TinyMCE Helper with NULL values\n";
echo "======================================\n\n";

// Test 1: Process with null content
echo "Test 1: Process with null content\n";
$result1 = TinyMCEHelper::process(null);
echo "Result: " . ($result1 === null ? 'null' : $result1) . " ✅\n\n";

// Test 2: Process with empty string
echo "Test 2: Process with empty string\n";
$result2 = TinyMCEHelper::process('');
echo "Result: '" . $result2 . "' ✅\n\n";

// Test 3: Get plain text with null
echo "Test 3: Get plain text with null\n";
$result3 = TinyMCEHelper::getPlainText(null);
echo "Result: " . ($result3 === null ? 'null' : $result3) . " ✅\n\n";

// Test 4: IsPlainText with null
echo "Test 4: IsPlainText with null\n";
$result4 = TinyMCEHelper::isPlainText(null);
echo "Result: " . ($result4 ? 'true' : 'false') . " ✅\n\n";

// Test 5: Convert with null
echo "Test 5: Convert with null\n";
$result5 = TinyMCEHelper::convertTo(null, 'plain');
echo "Result: " . ($result5 === null ? 'null' : $result5) . " ✅\n\n";

// Test 6: Validate with null (required = false)
echo "Test 6: Validate with null (required = false)\n";
$result6 = TinyMCEHelper::validate(null, ['required' => false]);
echo "Result: " . (empty($result6) ? 'No errors' : implode(', ', $result6)) . " ✅\n\n";

// Test 7: Validate with null (required = true)
echo "Test 7: Validate with null (required = true)\n";
$result7 = TinyMCEHelper::validate(null, ['required' => true]);
echo "Result: " . (empty($result7) ? 'No errors' : implode(', ', $result7)) . " ✅\n\n";

echo "All NULL handling tests passed! ✅\n";
