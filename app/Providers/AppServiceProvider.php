<?php

namespace App\Providers;

use App\Book;
use App\Genre;
use Illuminate\Support\Facades\View as FacadesView;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        FacadesView::composer('*', function ($view) {
            $view->with('genres', Genre::all());
        });
        FacadesView::composer('*', function ($view) {
            $view->with('latestBooks', Book::orderBy('created_at', 'desc')->take(8)->get());
        });
    }
}
