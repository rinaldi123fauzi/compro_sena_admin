<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        URL::forceScheme('https');
        
        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression, 0, ',', '.'); ?>";
        });

        // Custom Blade directive for TinyMCE content processing
        Blade::directive('tinymce', function ($expression) {
            return "<?php echo App\Helpers\TinyMCEHelper::process($expression) ?? ''; ?>";
        });

        // Custom Blade directive for TinyMCE plain text
        Blade::directive('tinymceplain', function ($expression) {
            return "<?php echo App\Helpers\TinyMCEHelper::getPlainText($expression) ?? ''; ?>";
        });

        // Custom Blade directive for TinyMCE with options
        Blade::directive('tinymceprocess', function ($expression) {
            return "<?php echo App\Helpers\TinyMCEHelper::process($expression, ['removeWrapperTags' => true]) ?? ''; ?>";
        });

        // Custom Blade directive for safe HTML output
        Blade::directive('safehtml', function ($expression) {
            return "<?php echo \$expression ?? ''; ?>";
        });

        View::composer('*', function ($view) {
            //$view->with('globalurl', 'http://127.0.0.1:8000/upload/image/');
            $view->with('globalurl', 'https://profile.pt-sena.co.id/upload/image/');
        });

        config([
            'upload.paths.image' => $_SERVER['DOCUMENT_ROOT'] . '/upload/image',
            'upload.paths.document' => $_SERVER['DOCUMENT_ROOT'] . '/upload/file',
            // Tambahkan path lain sesuai kebutuhan
        ]);
    }
}
