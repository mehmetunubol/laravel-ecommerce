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
    	if(auth()->user())
    	{
    		$wishlists = auth()->user()->wishlist()->get();
        	return view('site.pages.account.wishlist', compact('wishlists'));	
    	}
        return redirect()->back();
    }

    public function addToWishlist(Request $request)
    {
    	$wishlist = $this->wishlistRepository->addProductToWishlist($request->productId);

    	if (!$wishlist) {
            return redirect()->back()->with('message','error | An error is occured.');
        }
        return redirect()->back()->with('message','success | Product is added to your wishlist.');
    }

    public function removeFromWishlist(Request $request)
    {
    	$wishlist = $this->wishlistRepository->removeProductFromWishlist($request->productId);

    	if (!$wishlist) {
            return redirect()->back()->with('message','error | An error is occured.');
        }
        return redirect()->back()->with('message','success | Product is removed from your wishlist.');
    }
}
