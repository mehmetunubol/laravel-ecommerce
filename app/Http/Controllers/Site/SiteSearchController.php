<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\SiteSearchContract;
use App\Contracts\ProductContract;

class SiteSearchController extends Controller
{
    protected $sitesearchRepository;
    protected $productRepository;

    public function __construct(SiteSearchContract $sitesearchRepository, ProductContract $productRepository)
    {
        $this->sitesearchRepository = $sitesearchRepository;
        $this->productRepository = $productRepository;
    }

    public function searchProducts(Request $request)
    {
        $searchText = $request->input('search');

        $products = $this->productRepository->searchAllProducts($searchText);
        $resultIds = $products->map(function ($p) {
            return $p->id;
        });

        $search = [
            'search'     => $searchText,
            'type'       => 'product',
            'results'    => $products->count(),
            'result_ids' => $resultIds

        ];

        $searchRecord = $this->sitesearchRepository->addSiteSearch($search);

        return view('site.pages.products', compact('products', 'searchRecord'));
    }
}
