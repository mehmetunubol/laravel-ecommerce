<?php

namespace App\Repositories;

use App\Models\Wishlist;
use App\Contracts\WishlistContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class WishlistRepository extends BaseRepository implements WishlistContract
{
	public function __construct(Wishlist $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function findWishlistByProductId($productId)
    {
    	if(auth()->user())
    	{
    		return auth()->user()->wishlist->where('product_id',$productId)->first();
    	}

    }

    public function addProductToWishlist($productId)
    {
    	$wishlist = new Wishlist();

    	if( $this->findWishlistByProductId($productId) == null )
    	{
    		$wishlist->user_id = auth()->user()->id;
	    	$wishlist->product_id = $productId;

	    	$wishlist->save();

	    	return $wishlist;	
    	}

    	return null;
    	
    }

    public function removeProductFromWishlist($productId)
    {
    	if( $wishlist = $this->findWishlistByProductId($productId) )
    	{
    		$wishlist->delete();

    		return $wishlist;
    	}

    	return null;

    }
}