<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Product;
use App\Contracts\ProductContract;
use App\Contracts\ProductStatsContract;

class ProductComposer
{
    protected $productRepository;
    protected $productStatsRepository;

    /**
     *
     * @param  ProductContract, ProductStatsContract
     * @return void
     */
    public function __construct(ProductContract $productRepository, ProductStatsContract $productStatsRepository)
    {
        $this->productRepository = $productRepository;
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
        $recentlyViewed = array();
        $recentlyViewedIds = session()->get('products.recently_viewed');
        $i = 0;
        $limit = 4;
        if (isset($recentlyViewedIds)) {
            $recentlyViewedIds = array_filter($recentlyViewedIds, 
                                                function ($p) use($view, $i, $limit) {
                                                    $i++;
                                                    return ($p != $view->product->id && ($i - 1 < $limit) );
                                                }
                                            );
            $recentlyViewed = $this->productRepository->findProductsByIds($recentlyViewedIds);
        }

        /**
         * Add currently viewed product to the session
         */
        session()->push('products.recently_viewed', $view->product->id);

        /**
         * Similar Products Implementation
         */
        $similarProducts = $this->productRepository->findSimilarProducts($view->product->id);

        /**
         * Increment Product Statistics
         */
        $this->productStatsRepository->incrementProductStats($view->product->id, 'view');

        /** 
         * Push prepared records to the view 
         */
        $view->with([
            'recentlyViewed' =>  $recentlyViewed,
            'similarProducts' => $similarProducts,
        ]);
    }
}