<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Intervention\Image\ImageManager;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ImageManager', function () {
            return new ImageManager(array('driver' => 'gd')); // or 'imagick'
            
        });
       // $this->app->singleton(Intervention\Image\ImageServiceProvider::class, function ($app) {
          //  return new Intervention\Image\ImageServiceProvider($app);
      //  });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
