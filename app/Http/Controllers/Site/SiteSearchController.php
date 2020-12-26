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
        if ( !isset($searchText) ) {
            return redirect()->back();
        }
        $order = null;
        if ($request->has('order'))
        {
            $orderByArray = explode('-', $request->input('order'));
            $order['column'] = $orderByArray[0];
            $order['type'] = $orderByArray[1];
        }
        $products = $this->productRepository->searchAllProducts($searchText, $order)->paginate(15);
        $products->appends(['search' => $searchText]);
        
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
