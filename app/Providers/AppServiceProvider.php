<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Product\ProductRepositoryInterface::class,
            \App\Repositories\Product\ProductRepository::class
        );

        $this->app->singleton(
            \App\Repositories\ProductDetail\ProductDetailRepositoryInterface::class,
            \App\Repositories\ProductDetail\ProductDetailRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Category\CategoryRepositoryInterface::class,
            \App\Repositories\Category\CategoryRepository::class
        );

        $this->app->singleton(
            \App\Repositories\SuggestProduct\SuggestRepositoryInterface::class,
            \App\Repositories\SuggestProduct\SuggestProductRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Admin\AdminRepositoryInterface::class,
            \App\Repositories\Admin\AdminRepository::class
        );

        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class
        );

        $this->app->singleton(
            \App\Repositories\InfoDelivery\InfoDeliveryRepositoryInterface::class,
            \App\Repositories\InfoDelivery\InfoDeliveryRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Order\OrderRepositoryInterface::class,
            \App\Repositories\Order\OrderRepository::class
        );

        $this->app->singleton(
            \App\Repositories\OrderDetail\OrderDetailRepositoryInterface::class,
            \App\Repositories\OrderDetail\OrderDetailRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Category::all();
        View::share('categories', $categories);
    }
}
