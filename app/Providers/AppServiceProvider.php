<?php

namespace App\Providers;

use App\Models\Login;
use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;

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
        view()->composer('*', function($view){
            $min_price = Product::min('product_price');
            $max_price = Product::max('product_price');
            $max_add = $max_price + 500000;

            $product = Product::all()->count();
            $order_count = Order::all()->count();
            $admin = Login::all()->count();
            $customer = Customer::all()->count();
            $product_views = Product::orderBy('product_views','DESC')->take(20)->get();
    

            $view->with('min_price',$min_price)->with('product_views',$product_views)->with('max_price',$max_price)->with('max_add',$max_add)->with('product',$product)
            ->with('order_count',$order_count)->with('customer',$customer)->with('admin',$admin);
        });
    }
}
