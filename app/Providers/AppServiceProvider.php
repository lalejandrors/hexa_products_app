<?php

namespace App\Providers;

use App\Core\Repositories\CategoriaRepository;
use App\Infraestructure\Repositories\EloquentCategoriaRepository;
use App\Core\Repositories\ProductoRepository;
use App\Infraestructure\Repositories\EloquentProductoRepository;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoriaRepository::class, EloquentCategoriaRepository::class);
        $this->app->bind(ProductoRepository::class, EloquentProductoRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
