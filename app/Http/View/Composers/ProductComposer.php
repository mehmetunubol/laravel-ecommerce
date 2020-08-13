<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Product;
use App\Contracts\ProductStatsContract;

class ProductComposer
{
    /**
     *
     * @var ProductStatsRepository
     */
    protected $productStatsRepository;

    /**
     *
     * @param  ProductStatsContract 
     * @return void
     */
    public function __construct(ProductStatsContract $productStatsRepository)
    {
        $this->productStatsRepository = $productStatsRepository;
    }
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        /**
         * Recently Viewed Product Implementation
         */
        $products = array_filter(session()->get('products.recently_viewed'), function ($p) use($view) {
            return $p != $view->product->id;
        });
        $view->with([
            'recentlyViewed' => Product::find($products),
        ]);
        session()->push('products.recently_viewed', $view->product->id);
        
        /**
         * Increment Product Statistics
         */
        $this->productStatsRepository->incrementProductStats($view->product->id, 'view');
    }
}