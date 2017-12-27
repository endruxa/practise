<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->topMenu();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    //Menu for users
    public function topMenu(){
        View::composer('layouts.header.', function ($view){
            $view->with('categories', Category::where('parent_id', 0)->where('published', 1)->get());
        });
    }
}
