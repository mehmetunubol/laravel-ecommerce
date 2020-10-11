<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Contracts\WishlistContract;

class WishlistController extends Controller
{
	public function __construct(WishlistContract $wishlistRepository)
    {
        $this->wishlistRepository = $wishlistRepository;
    }

    public function getWishlist()
    {
        $wishlists = auth()->user()->wishlist()->get();
        return view('site.pages.account.wishlist', compact('wishlists'));	
    }

    public function addToWishlist(Request $request)
    {
    	$wishlist = $this->wishlistRepository->addProductToWishlist($request->productId);

    	if (!$wishlist) {
            return redirect()->back()->with('message','error | An error is occured.');
        }
        return redirect()->back()->with('message',__('Ürün Favorilerinize eklendi.'));
    }

    public function removeFromWishlist(Request $request)
    {
    	$wishlist = $this->wishlistRepository->removeProductFromWishlist($request->productId);

    	if (!$wishlist) {
            return redirect()->back()->with('message','error | An error is occured.');
        }
        return redirect()->back()->with('message',__('Ürün Favorilerinizden çıkarıldı'));
    }
}
