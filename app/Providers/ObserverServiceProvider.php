<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Dish;
use App\Models\Image;
use App\Models\Ingredient;
use App\Models\User;
use App\Observers\CategoryObserver;
use App\Observers\DishObserver;
use App\Observers\ImageObserver;
use App\Observers\IngredientObserver;
use App\Observers\UserObserver;
use App\Services\Observers\Contracts\MorphRelationsDeleteInterface;
use App\Services\Observers\MorphRelationsDelete;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Dish::observe(DishObserver::class);
        Category::observe(CategoryObserver::class);
        Ingredient::observe(IngredientObserver::class);
        Image::observe(ImageObserver::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MorphRelationsDeleteInterface::class, MorphRelationsDelete::class);

        /*$this->app->singleton('App\Services\Observers\Contracts\MorphRelationsDeleteInterface', function () {
            return new MorphRelationsDelete();
        });*/
    }
}