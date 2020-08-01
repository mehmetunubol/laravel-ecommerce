<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Contracts\ProductContract;
use App\Contracts\AttributeContract;
use App\Contracts\WishlistContract;

use App\Http\Controllers\Controller;

use Cart;

class ProductController extends Controller
{
    
    protected $productRepository;

    protected $attributeRepository;

    protected $wishlistRepository;

    public function __construct(ProductContract $productRepository, AttributeContract $attributeRepository, WishlistContract $wishlistRepository)
    {
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
        $this->wishlistRepository = $wishlistRepository;
    }

    public function show($slug)
    {
        $product = $this->productRepository->findProductBySlug($slug);
        $attributes = $this->attributeRepository->listAttributes();
        $wishlist = $this->wishlistRepository->findWishlistByProductId($product->id);
        return view('site.pages.product', compact('product', 'attributes','wishlist'));
    }

    public function addToCart(Request $request)
    {
        $product = $this->productRepository->findProductById($request->input('productId'));
        $options = $request->except('_token', 'productId', 'price', 'qty');
    
        Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options);
    
        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }
}