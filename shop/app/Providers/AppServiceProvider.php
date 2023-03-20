<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ProductType;
use App\Models\Cart;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        view()->composer('header',function($view){
            $loaisp=ProductType::all();
            
            $view->with(['loaisp'=>$loaisp]);
        });
        view()->composer(['header','page.dathang'],function($view){
             if (Session::has('cart')) {
                 $oldCart =Session::get('cart');
                 $cart= new Cart($oldCart);
                 // code...
                $view->with([
                'cart'=>Session::get('cart'),
                'product_cart'=>$cart->items,
                'totalPrice'=>$cart->totalPrice,
                'totalQty'=>$cart->totalQty]);
             }
        });


    }
}
