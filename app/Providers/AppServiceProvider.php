<?php

namespace App\Providers;

use App\Cart;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
        view()->composer('*', function ($view) {
            
            if (Auth::check()) {
                $my_cart = Cart::where('user_id', Auth::id())->count();
            }
            else{
                $my_cart = null;
            }
            $links = Session::get('routes');
            $admin = Session::get('admin');
            $user_state = Session::get('state');
            $categories = Category::all();
            $products = Product::all();
            $todaysDate = \date('y/m/d');
            $view->with(compact('links', 'admin', 'categories', 'products', 'todaysDate', 'user_state', 'my_cart'));
        });
    }
}
