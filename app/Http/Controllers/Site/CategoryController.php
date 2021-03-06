<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\CategoryContract;
use App\Contracts\AttributeContract;
use App\Support\Collection;

class CategoryController extends Controller
{
    protected $categoryRepository;
    protected $attributeRepository;

    public function __construct(CategoryContract $categoryRepository, AttributeContract $attributeRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->attributeRepository = $attributeRepository;
    }

    public function categories()
    {
        $categories = $this->categoryRepository->listCategories()->where('parent_id','<>', NULL);

        return view('site.pages.category_products.categories', compact('categories'));
    }
    public function show(Request $request, $slug)
    {
        $appliedFilter = "";
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
         * usage: ?priceLow=min&priceHigh=max
         */
        if ($request->has('priceLow') || $request->has('priceHigh'))
        {
            
            /*
            * examples:       Query            Results
            *              price=0-100           0 < $p->price < 100
            *              price=100           100 < $p->price
            *              price=200-300       200 < $p->price < 300
            *  $price_filters = explode('-', $request->input('price'));
            */
            $price_filters = array($request->input('priceLow'), $request->input('priceHigh'));
            foreach ($price_filters as $i => $price) {
                if($i === 0)
                {
                    array_push($final_filter, ['price', '>', $price]);
                }
                else {
                    array_push($final_filter, ['price', '<', $price]);
                }
            }
            $appliedFilter = $request->input('priceLow').config('settings.currency_symbol')." - ".$request->input('priceHigh').config('settings.currency_symbol');
        }
        // End of Price Filter Implementation

        /**
         * General Attribute Filter Implementation
         *  
         * Usage:   
         *          filter=attr1_val1-attr1_val2,attr2_val1-attr2_val2
         * 
         * Example: filter=kırmızı-beyaz,36-42-32
         * 
         */
        
         // sidebar should be active for all pages from now on.
        $is_sidebar_on = true;//$request->has('sb') ? true : false;
        if ($request->has('filter'))
        {
            $filters = explode(',', $request->input('filter'));
            
            foreach ($filters as $filter) {
                $attr_filters = [];
                //[$attribute, $values_string] = explode(':', $filter);
                // TODO: Check if needed.
                // -> $attribute: attribute name(Renk) is not used !! Since we have attribute value(kırmızı) as column in product_attributes table.
                $values = explode('-', $filter);
                foreach ($values as $value) {
                    array_push($attr_filters, strval($value));
                    $appliedFilter .= " " . $value;
                }
                array_push($final_filter, $attr_filters);
            }
        }

        /* 
            Below is the "Multiple Category Request" implementation.
            $cat_slugs = $slug+$slug
            Example: www.site.com/category/man+woman+prom-dress
        */
        $cat_slugs = explode('+', $slug);
        $category = $this->categoryRepository->findBySlugWithOrderFilter($cat_slugs[0], $order, $final_filter);

        if( !$category )
        {
            return redirect()->back()->with('warning_message', 'Kategori bulunamadı.');
        }

        if ( $appliedFilter === "" ) 
        {
            $appliedFilter = $category->name;
        }

        $products = $category->products;

        foreach ($cat_slugs as $i => $cat_slug) {
            if( $i > 0)
            {
                $products = $this->categoryRepository->findBySlugWithOrderFilter($cat_slugs[$i], $order, $final_filter)
                    ->products->merge($products);
            }
        }

        $category->products = (new Collection($products))->paginate(15);
        // End of "Multiple Category Request" implementation

        $categories = $this->categoryRepository->listCategories()->where('parent_id','<>', NULL);

        //$attributes = $this->attributeRepository->listAttributes();
        // Don't want to list all defined attributes, just show applicable ones.
        $applicable_attributes = [];
        foreach ($products as $p) {
            if( count($p->attributes) > 0 )
            {
                array_push($applicable_attributes, $p->attributes()->groupBy('attribute_id')->pluck('attribute_id'));
            }
        }

        $applicable_attributes = array_unique($applicable_attributes);

        $attributes = [];
        if ( count($applicable_attributes) > 0)
        {      
            $attributes = $this->attributeRepository->findAttributesbyIds($applicable_attributes);
        }
        

        return view('site.pages.category_products.category', compact('category', 'categories', 'attributes', 'is_sidebar_on', 'appliedFilter'));
    }
}