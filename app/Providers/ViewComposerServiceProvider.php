<?php
/*
 * The detailed information about View Composers can be found at -> https://laravel.com/docs/7.x/views#view-composers
*/
namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Cart;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('site.partials.nav', function ($view) {
            $view->with('categories', Category::orderByRaw('-name ASC')->get()->nest());
        });
        View::composer('site.partials.header', function ($view) {
            $view->with('cartItems', Cart::getContent())
                 ->with('categories', \App\Models\Category::where('parent_id',1)->get());
        });

        View::composer(
            'site.pages.product', 'App\Http\View\Composers\ProductComposer'
        );
    }
}