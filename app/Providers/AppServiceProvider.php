<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Request;
use App\Helper\CartHelper;
use App\Models\LoaiSPModels;
use App\Models\SanPhamModels;
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
        Paginator::useBootstrap();
        
        view()->composer('*', function ($view) {
            $nameSearch = Request::input('nameSearch');
            $sanPhamModels = new SanPhamModels;
            $productSearch = $sanPhamModels->getProduct($nameSearch);
            $view->with([
                'cart' => new CartHelper(),
                'categorys' => LoaiSPModels::where('TrangThai', '1')->get(),
                'productSearch' => $productSearch,
                'nameSearch' => $nameSearch,
            ]);
        });
    }
}
