<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class BreadcrumbServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('admin.layouts.partial.navbar', function ($view) {
            $segments = request()->segments();
            $breadcrumbs = [];

            // Check if the current route is not the dashboard
            if (!request()->is('admin/dashboard')) {
                $breadcrumbs[] = [
                    'url' => '/admin/dashboard',
                    'name' => 'Dashboard',
                ];
            }

            // Iterate over segments after 'admin' prefix
            for ($i = 1; $i < count($segments); $i++) {
                // Check if the segment looks like an id (numeric)
                if (!is_numeric($segments[$i])) {
                    $breadcrumbs[] = [
                        'url' => '/' . implode('/', array_slice($segments, 0, $i + 1)),
                        'name' => ucfirst($segments[$i]),
                    ];
                }
            }
            $view->with('breadcrumbs', $breadcrumbs);
        });
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
