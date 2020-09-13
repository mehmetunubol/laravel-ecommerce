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

        return view('site.pages.categories', compact('categories'));
    }
    public function show(Request $request, $slug)
    {
        /* 
            * !!!
            * Expected Front-End for the ORDER BY 
                <option value="" disabled selected>Order by</option>
                <option value="id-asc">Id (Asc)</option>
                <option value="id-desc">Id (Desc)</option>
                <option value="name-asc">Name (A - Z)</option>
                <option value="name-desc">Name (Z - A)</option>
            * !!!
            * Or we can do it as query string parameter 
            * exp:  "/category/{slug}?order=price-desc"
        */
        $order = null;
        if ($request->has('order'))
        {
            $orderByArray = explode(' ', $request->input('order'));
            $order['column'] = $orderByArray[0];
            $order['type'] = $orderByArray[1];
        }
        // Test code, TODO: remove the test code
        //$order['column'] = 'price';
        //$order['type'] = 'desc';
        // End Test code
        /*
            * Expected Request
            * TODO: It is not decided yet! Request may have multiple filters
            "/category/{slug}?filter="
        
        */
        $filter = null;
        if ($request->has('filter'))
        {
            $filters = explode(',', $request->input('filter'));
            // TODO: It should be implemented according to decision
        }
        // Test code, TODO: remove the test code
        $filter = [
            ['price', '>', 1],
            ['quantity', '>', 1]
        ];
        // End Test code
        $category = $this->categoryRepository->findBySlugWithOrderFilter($slug, $order, $filter);
        
        return view('site.pages.category', compact('category'));
    }
}