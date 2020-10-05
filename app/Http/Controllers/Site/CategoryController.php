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
        $final_filter = [];

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
            
            $price_filters = explode('-', $request->input('price'));
            if(sizeof($price_filters) <= 0 && sizeof($price_filters) > 1)
            {
                // Unexpected input for price filter
            }
            foreach ($price_filters as $i => $price) {
                if($i === 0)
                {
                    array_push($final_filter, ['price', '>', $price]);
                }
                else {
                    array_push($final_filter, ['price', '<', $price]);
                }
            }
        }
        // End of Price Filter Implementation

        /**
         * General Attribute Filter Implementation
         *  
         * Usage:    filter=attr1_name:attr1_val1-attr1_val2,attr2_name:attr2_val1-attr2_val2
         * 
         * Example: filter=Renk:kırmızı-beyaz,Beden:36-42-32
         * 
         */
        
        $is_sidebar_on = $request->has('sb') ? true : false;
        if ($request->has('filter'))
        {
            $filters = explode(',', $request->input('filter'));
            foreach ($filters as $filter) {
                [$attribute, $values_string] = explode(':', $filter);
                // TODO: Check if needed.
                // -> $attribute: attribute name(Renk) is not used !! Since we have attribute value(kırmızı) as column in product_attributes table.
                $values = explode('-', $values_string);
                foreach ($values as $value) {
                    // TODO: These should be Added to whole query as AND condition, but it should be OR in this foreach.
                    array_push($final_filter, ['value', strval($value)]);
                }
            }
        }

        /* 
            Below is the "Multiple Category Request" implementation.
            $cat_slugs = $slug+$slug
            Example: www.site.com/category/man+woman+prom-dress
        */
        $cat_slugs = explode('+', $slug);
        $category = $this->categoryRepository->findBySlugWithOrderFilter($cat_slugs[0], $order, $final_filter);
        $products = $category->products;

        foreach ($cat_slugs as $i => $cat_slug) {
            if( $i > 0)
            {
                $products = $this->categoryRepository->findBySlugWithOrderFilter($cat_slugs[$i], $order, $final_filter)
                    ->products->merge($products);
            }
        }
        $category->products = $products;
        // End of "Multiple Category Request" implementation

        return view('site.pages.category_products.category', compact('category', 'is_sidebar_on'));
    }
}