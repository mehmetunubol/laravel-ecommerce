<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\CategoryContract;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function categories()
    {
        $categories = $this->categoryRepository->listCategories()->where('parent_id','<>', NULL);

        return view('site.pages.category_products.categories', compact('categories'));
    }
    public function show(Request $request, $slug)
    {
        $order = null;
        if ($request->has('order'))
        {
            $orderByArray = explode('-', $request->input('order'));
            $order['column'] = $orderByArray[0];
            $order['type'] = $orderByArray[1];
        }
        /*
            * Expected Request
            * TODO: It is not decided yet! Request may have multiple filters
            "/category/{slug}?filter="
        
        */
        $filter = null;

        /**
         * Price Filter Implementation
         * usage: ?price=min-max
         * examples:       Query            Results
         *              price=0-100           0 < $p->price < 100
         *              price=100           100 < $p->price
         *              price=200-300       200 < $p->price < 300
         */
        if ($request->has('price'))
        {
            $filter = [];
            $price_filters = explode('-', $request->input('price'));
            if(sizeof($price_filters) <= 0 && sizeof($price_filters) > 1)
            {
                // Unexpected input for price filter
            }
            foreach ($price_filters as $i => $price) {
                if($i === 0)
                {
                    array_push($filter, ['price', '>', $price]);
                }
                else {
                    array_push($filter, ['price', '<', $price]);
                }
            }
        }
        // End of Price Filter Implementation

        $is_sidebar_on = $request->has('sb') ? true : false;
        if ($request->has('filter'))
        {
            $filters = explode(',', $request->input('filter'));
            // TODO: It should be implemented according to decision
        }
        // Test code, TODO: remove the test code
        /*
        $filter = [
            ['price', '>', 1],
            ['quantity', '>', 1]
        ];
        */
        // End Test code

        /* 
            Below is the "Multiple Category Request" implementation.
            $cat_slugs = $slug+$slug
            Example: www.site.com/category/man+woman+prom-dress
        */
        $cat_slugs = explode('+', $slug);
        $category = $this->categoryRepository->findBySlugWithOrderFilter($cat_slugs[0], $order, $filter);
        $products = $category->products;

        foreach ($cat_slugs as $i => $cat_slug) {
            if( $i > 0)
            {
                $products = $this->categoryRepository->findBySlugWithOrderFilter($cat_slugs[$i], $order, $filter)
                    ->products->merge($products);
            }
        }
        $category->products = $products;
        // End of "Multiple Category Request" implementation

        return view('site.pages.category_products.category', compact('category', 'is_sidebar_on'));
    }
}