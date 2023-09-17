<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

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
        if (env('DB_QUERY_LOG')) {
            DB::listen(function ($query) {
                Log::channel('database-query')
                    ->info($query->sql . ' [' . implode(', ', $query->bindings) . ']' . PHP_EOL);
            });
        }
    }
}
