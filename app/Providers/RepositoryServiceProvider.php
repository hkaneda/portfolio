<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\Item\ItemRepositoryInterface::class,
            \App\Repositories\Item\ItemRepository::class
        );

        $this->app->bind(
            \App\Repositories\Admin\AdminRepositoryInterface::class,
            \App\Repositories\Admin\AdminRepository::class
        );

        $this->app->bind(
            \App\Repositories\Cart\CartRepositoryInterface::class,
            \App\Repositories\Cart\CartRepository::class
        );

        $this->app->bind(
            \App\Repositories\Favorite\FavoriteRepositoryInterface::class,
            \App\Repositories\Favorite\FavoriteRepository::class
        );

        $this->app->bind(
        \App\Repositories\History\HistoryRepositoryInterface::class,
        \App\Repositories\History\HistoryRepository::class
        );

        $this->app->bind(
        \App\Repositories\View\ViewRepositoryInterface::class,
        \App\Repositories\View\ViewRepository::class
        );

        $this->app->bind(
        \App\Repositories\Shop\ShopRepositoryInterface::class,
        \App\Repositories\Shop\ShopRepository::class
        );
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
