<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Article;
use App\Events\NewArticle;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Article::created(function($article){
          event(new NewArticle($article));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
