<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Helpers\TinyMCEHelper;

echo "Testing TinyMCE Helper Functions\n";
echo "=================================\n\n";

// Test 1: Basic plain text processing
echo "Test 1: Basic Plain Text Processing\n";
$content1 = '<div>Hello World</div>';
$plain1 = TinyMCEHelper::getPlainText($content1);
echo "Original: " . $content1 . "\n";
echo "Plain: " . $plain1 . "\n";
echo "Is Plain Text: " . (TinyMCEHelper::isPlainText($content1) ? 'Yes' : 'No') . "\n\n";

// Test 2: Paragraph processing
echo "Test 2: Paragraph Processing\n";
$content2 = '<p>This is a paragraph</p>';
$plain2 = TinyMCEHelper::getPlainText($content2);
echo "Original: " . $content2 . "\n";
echo "Plain: " . $plain2 . "\n";
echo "Is Plain Text: " . (TinyMCEHelper::isPlainText($content2) ? 'Yes' : 'No') . "\n\n";

// Test 3: Complex content
echo "Test 3: Complex Content\n";
$content3 = '<div><strong>Bold</strong> and <em>italic</em> text</div>';
$plain3 = TinyMCEHelper::getPlainText($content3);
echo "Original: " . $content3 . "\n";
echo "Plain: " . $plain3 . "\n";
echo "Is Plain Text: " . (TinyMCEHelper::isPlainText($content3) ? 'Yes' : 'No') . "\n\n";

// Test 4: Process with options
echo "Test 4: Process with Options\n";
$content4 = '<div>Simple text content</div>';
$processed4 = TinyMCEHelper::process($content4, ['removeWrapperTags' => true]);
echo "Original: " . $content4 . "\n";
echo "Processed: " . $processed4 . "\n\n";

// Test 5: Validation
echo "Test 5: Content Validation\n";
$content5 = '<div>Valid content</div>';
$errors5 = TinyMCEHelper::validate($content5, ['maxLength' => 50, 'requirePlainText' => true]);
echo "Content: " . $content5 . "\n";
echo "Validation errors: " . (empty($errors5) ? 'None' : implode(', ', $errors5)) . "\n\n";

// Test 6: Convert to different formats
echo "Test 6: Format Conversion\n";
$content6 = '<div>Test content</div>';
$markdown6 = TinyMCEHelper::convertTo($content6, 'markdown');
$text6 = TinyMCEHelper::convertTo($content6, 'text');
echo "Original: " . $content6 . "\n";
echo "Markdown: " . $markdown6 . "\n";
echo "Text: " . $text6 . "\n\n";

echo "All tests completed successfully!\n";
