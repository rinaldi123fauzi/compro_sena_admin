<?php

return [
    // GA4 Property ID
    'property_id' => env('ANALYTICS_PROPERTY_ID', ''),

    // Credentials: resolve first existing file among supported names.
    // Spatie package expects key name: service_account_credentials_json
    'service_account_credentials_json' => (function () {
        $candidates = [
            'key.json', // current filename
            'service-account-credentials.json',
            'service-account.json',
        ];
        foreach ($candidates as $file) {
            $full = storage_path('app/analytics/' . $file);
            if (is_file($full)) {
                return $full;
            }
        }
        // If none found, throw early to make the problem explicit.
        throw new RuntimeException('No GA credentials file found in storage/app/analytics (.json). Expected one of: ' . implode(', ', $candidates));
    })(),

    // Cache store & lifetime (seconds). Use default cache store.
    'cache' => [
        'store' => null, // null = default
        'lifetime_in_seconds' => 300,
    ],

    // Default timezone for date formatting (optional)
    'timezone' => env('APP_TIMEZONE', 'Asia/Jakarta'),
];
