<?php

namespace App\Helpers;

class TinyMCEHelper
{
  /**
   * Process TinyMCE content with various options
   */
  public static function process(?string $content, array $options = []): ?string
  {
    $removeWrapperTags = $options['removeWrapperTags'] ?? false;
    $preserveFormatting = $options['preserveFormatting'] ?? true;
    $stripEmptyTags = $options['stripEmptyTags'] ?? false;

    if ($content === null || $content === '') {
      return $content;
    }

    $processed = $content;

    if ($removeWrapperTags) {
      $processed = self::removeWrapperTags($processed);
    }

    if ($stripEmptyTags) {
      $processed = self::stripEmptyTags($processed);
    }

    return $processed;
  }
  /**
   * Remove wrapper tags from content
   */
  public static function removeWrapperTags(?string $content): ?string
  {
    if ($content === null || $content === '') {
      return $content;
    }
    // Remove simple div wrapper with no classes or attributes
    $content = preg_replace('/<div[^>]*class=""[^>]*>(.*?)<\/div>/s', '$1', $content);
    $content = preg_replace('/<div[^>]*(?!class)[^>]*>(.*?)<\/div>/s', '$1', $content);

    // Remove specific plain text wrapper divs
    $content = preg_replace('/<div[^>]*class="plain-text"[^>]*>(.*?)<\/div>/s', '$1', $content);

    // Convert simple div-wrapped text to just text (careful with this)
    if (preg_match('/^<div[^>]*>([^<]+)<\/div>$/s', trim($content), $matches)) {
      $content = $matches[1];
    }

    return $content;
  }
  /**
   * Strip empty tags from content
   */
  public static function stripEmptyTags(?string $content): ?string
  {
    if ($content === null || $content === '') {
      return $content;
    }
    // Remove empty divs
    $content = preg_replace('/<div[^>]*><\/div>/g', '', $content);

    // Remove empty paragraphs
    $content = preg_replace('/<p[^>]*><\/p>/g', '', $content);

    // Remove empty headings
    $content = preg_replace('/<h[1-6][^>]*><\/h[1-6]>/g', '', $content);

    return $content;
  }
  /**
   * Get plain text version of content
   */
  public static function getPlainText(?string $content): ?string
  {
    if ($content === null || $content === '') {
      return $content;
    }

    $trimmed = trim($content);

    // Remove simple div wrapper with no classes or attributes
    if (preg_match('/^<div[^>]*>([^<]+)<\/div>$/s', $trimmed, $matches)) {
      return $matches[1];
    }

    // Remove div with plain-text class
    if (preg_match('/^<div[^>]*class="plain-text"[^>]*>(.*?)<\/div>$/s', $trimmed, $matches)) {
      return strip_tags($matches[1]);
    }

    // Fallback to strip all tags
    return strip_tags($content);
  }
  /**
   * Check if content is plain text (single div without formatting)
   */
  public static function isPlainText(?string $content): bool
  {
    if ($content === null || $content === '') {
      return false;
    }
    $trimmed = trim($content);

    // Check if it's a simple div with text content
    if (preg_match('/^<div[^>]*>([^<]+)<\/div>$/s', $trimmed)) {
      return true;
    }

    // Check if it's div with plain-text class
    if (preg_match('/^<div[^>]*class="plain-text"[^>]*>([^<]*)<\/div>$/s', $trimmed)) {
      return true;
    }

    return false;
  }
  /**
   * Get content for display with conditional processing
   */
  public static function getDisplayContent(?string $content, bool $preferPlainText = false): ?string
  {
    if ($content === null || $content === '') {
      return $content;
    }

    if ($preferPlainText && self::isPlainText($content)) {
      return self::getPlainText($content);
    }

    return $content;
  }
  /**
   * Clean content for storage
   */
  public static function cleanForStorage(?string $content): ?string
  {
    if ($content === null || $content === '') {
      return $content;
    }

    $content = trim($content);

    // Remove unnecessary whitespace
    $content = preg_replace('/\s+/', ' ', $content);

    // Remove empty tags
    $content = self::stripEmptyTags($content);

    return $content;
  }
  /**
   * Validate TinyMCE content
   */
  public static function validate(?string $content, array $rules = []): array
  {
    $errors = [];

    if ($content === null || $content === '') {
      if (($rules['required'] ?? false)) {
        $errors[] = "Content is required";
      }
      return $errors;
    }

    $maxLength = $rules['maxLength'] ?? null;
    $minLength = $rules['minLength'] ?? null;
    $allowedTags = $rules['allowedTags'] ?? null;
    $requirePlainText = $rules['requirePlainText'] ?? false;

    // Check length
    $plainTextLength = strlen(self::getPlainText($content));

    if ($maxLength && $plainTextLength > $maxLength) {
      $errors[] = "Content exceeds maximum length of {$maxLength} characters";
    }

    if ($minLength && $plainTextLength < $minLength) {
      $errors[] = "Content is below minimum length of {$minLength} characters";
    }

    // Check if plain text required
    if ($requirePlainText && !self::isPlainText($content)) {
      $errors[] = "Content must be plain text without formatting";
    }

    // Check allowed tags
    if ($allowedTags) {
      $allowedTagsArray = is_array($allowedTags) ? $allowedTags : explode(',', $allowedTags);
      preg_match_all('/<([^>]+)>/i', $content, $matches);

      foreach ($matches[1] as $tag) {
        $tagName = strtolower(trim(explode(' ', $tag)[0]));
        if (!in_array($tagName, $allowedTagsArray)) {
          $errors[] = "Tag '{$tagName}' is not allowed";
        }
      }
    }

    return $errors;
  }
  /**
   * Convert content to different formats
   */
  public static function convertTo(?string $content, string $format): ?string
  {
    if ($content === null || $content === '') {
      return $content;
    }

    switch ($format) {
      case 'plain':
        return self::getPlainText($content);

      case 'markdown':
        // Basic HTML to Markdown conversion
        $content = preg_replace_callback('/<h([1-6])>(.*?)<\/h[1-6]>/i', function ($matches) {
          return str_repeat('#', intval($matches[1])) . ' ' . $matches[2] . PHP_EOL;
        }, $content);
        $content = preg_replace('/<p>(.*?)<\/p>/i', '$1' . PHP_EOL . PHP_EOL, $content);
        $content = preg_replace('/<strong>(.*?)<\/strong>/i', '**$1**', $content);
        $content = preg_replace('/<em>(.*?)<\/em>/i', '*$1*', $content);
        $content = preg_replace('/<div[^>]*>(.*?)<\/div>/i', '$1' . PHP_EOL, $content);
        return trim($content);

      case 'text':
        return strip_tags($content);

      default:
        return $content;
    }
  }

  /**
   * Get TinyMCE configuration array
   */
  public static function getConfig(array $overrides = []): array
  {
    $defaultConfig = [
      'height' => 300,
      'menubar' => false,
      'plugins' => 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      'toolbar' => 'undo redo | blocks styleselect | bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | table link image media | code',
      'forced_root_block' => 'div',
      'forced_root_block_attrs' => [],
      'block_formats' => 'Normal Text=div; Paragraph=p; Main Title=h1; Section Title=h2; Sub Title=h3; Small Heading=h4; Smallest Heading=h5; Preformatted Text=pre; Quote Block=blockquote; Code Block=code; Address=address',
      'allow_empty_paragraphs' => true,
      'br_in_pre' => true,
      'formats' => [
        'normaltext' => [
          'block' => 'div',
          'remove' => 'all'
        ],
        'paragraph' => [
          'block' => 'p'
        ]
      ]
    ];

    return array_merge($defaultConfig, $overrides);
  }
}
