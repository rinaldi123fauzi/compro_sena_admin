<?php

echo "Testing Refactored HomeSliderController with TinyMCEHelper\n";
echo "=========================================================\n";

// Test the TinyMCEHelper methods directly since they're now being used
require_once 'app/Helpers/TinyMCEHelper.php';

use App\Helpers\TinyMCEHelper;

// Test 1: Null handling
echo "Test 1: Null handling\n";
$result1 = TinyMCEHelper::getPlainText(null);
echo "Input: null\n";
echo "Output: " . var_export($result1, true) . "\n";
echo "Expected: null\n";
echo "Status: " . ($result1 === null ? "PASS" : "FAIL") . "\n\n";

// Test 2: Empty string
echo "Test 2: Empty string\n";
$result2 = TinyMCEHelper::getPlainText('');
echo "Input: ''\n";
echo "Output: " . var_export($result2, true) . "\n";
echo "Expected: ''\n";
echo "Status: " . ($result2 === '' ? "PASS" : "FAIL") . "\n\n";

// Test 3: Simple div removal
echo "Test 3: Simple div removal\n";
$input3 = '<div>Hello World</div>';
$result3 = TinyMCEHelper::getPlainText($input3);
echo "Input: $input3\n";
echo "Output: $result3\n";
echo "Expected: Hello World\n";
echo "Status: " . ($result3 === 'Hello World' ? "PASS" : "FAIL") . "\n\n";

// Test 4: Complex div with attributes
echo "Test 4: Complex div with attributes\n";
$input4 = '<div class="editor-content" style="color: red;">Test Content</div>';
$result4 = TinyMCEHelper::getPlainText($input4);
echo "Input: $input4\n";
echo "Output: $result4\n";
echo "Expected: Test Content\n";
echo "Status: " . ($result4 === 'Test Content' ? "PASS" : "FAIL") . "\n\n";

// Test 5: Nested HTML
echo "Test 5: Nested HTML\n";
$input5 = '<div><strong>Bold</strong> and <em>italic</em> text</div>';
$result5 = TinyMCEHelper::getPlainText($input5);
echo "Input: $input5\n";
echo "Output: $result5\n";
echo "Expected: Bold and italic text\n";
echo "Status: " . ($result5 === 'Bold and italic text' ? "PASS" : "FAIL") . "\n\n";

// Test 6: Multiple divs
echo "Test 6: Multiple divs\n";
$input6 = '<div>First</div><div>Second</div>';
$result6 = TinyMCEHelper::getPlainText($input6);
echo "Input: $input6\n";
echo "Output: $result6\n";
echo "Expected: FirstSecond\n";
echo "Status: " . ($result6 === 'FirstSecond' ? "PASS" : "FAIL") . "\n\n";

// Test 7: Whitespace handling
echo "Test 7: Whitespace handling\n";
$input7 = '  <div>  Trimmed Content  </div>  ';
$result7 = TinyMCEHelper::getPlainText($input7);
echo "Input: '$input7'\n";
echo "Output: '$result7'\n";
echo "Expected: '  Trimmed Content  '\n";
echo "Status: " . ($result7 === '  Trimmed Content  ' ? "PASS" : "FAIL") . "\n\n";

// Test 8: Mixed content
echo "Test 8: Mixed content\n";
$input8 = 'Plain text <div>with div</div> and more';
$result8 = TinyMCEHelper::getPlainText($input8);
echo "Input: $input8\n";
echo "Output: $result8\n";
echo "Expected: Plain text with div and more\n";
echo "Status: " . ($result8 === 'Plain text with div and more' ? "PASS" : "FAIL") . "\n\n";

echo "All tests completed!\n";
