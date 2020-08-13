<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Contracts\ProductContract;
use App\Contracts\AttributeContract;
use App\Contracts\WishlistContract;
use App\Contracts\CategoryContract;
use App\Contracts\ProductStatsContract;

use App\Http\Controllers\Controller;

use Cart;

class ProductController extends Controller
{
    
    protected $productRepository;

    protected $attributeRepository;

    protected $wishlistRepository;
    
    protected $categoryRepository;

    protected $productStatsRepository;

    public function __construct(ProductContract $productRepository, 
                                AttributeContract $attributeRepository, 
                                WishlistContract $wishlistRepository,
                                CategoryContract $categoryRepository,
                                ProductStatsContract $productStatsRepository)
    {
        $this->productRepository        = $productRepository;
        $this->attributeRepository      = $attributeRepository;
        $this->wishlistRepository       = $wishlistRepository;
        $this->categoryRepository       = $categoryRepository;
        $this->productStatsRepository   = $productStatsRepository;
    }

    public function show($slug)
    {
        $product = $this->productRepository->findProductBySlug($slug);
        $attributes = $this->attributeRepository->listAttributes();
        $wishlist = $this->wishlistRepository->findWishlistByProductId($product->id);

        $tag_id = $this->categoryRepository->findTagId();
        $categories = array();
        $tags = array();
        foreach ($product->categories as $cat)
        {
            if($cat->parent_id == 1)
            {
                array_push($categories, $cat->name);
            }
            elseif ($cat->parent_id == $tag_id) {
                array_push($tags, $cat->name);
            }
        }
        $product->categories = $categories;
        $product->tags = $tags;

        return view('site.pages.product', compact('product', 'attributes','wishlist'));
    }

    public function addToCart(Request $request)
    {
        $product = $this->productRepository->findProductById($request->input('productId'));
        $options = $request->except('_token', 'productId', 'price', 'qty');
    
        Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options);
        $this->productStatsRepository->incrementProductStats($product->id, 'cart');
        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }
}