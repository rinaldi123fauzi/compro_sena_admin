<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression, 0, ',', '.'); ?>";
        });

        View::composer('*', function ($view) {
            //$view->with('globalurl', 'http://127.0.0.1:8000/upload/image/');
            $view->with('globalurl', 'https://liniercreativa.my.id/laravel/public/upload/image/');
        });

        config([
            'upload.paths.image' => $_SERVER['DOCUMENT_ROOT'] . '/upload/image',
            'upload.paths.document' => $_SERVER['DOCUMENT_ROOT'] . '/upload/file',
            // Tambahkan path lain sesuai kebutuhan
        ]);
    }
}
