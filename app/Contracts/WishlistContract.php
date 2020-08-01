<?php

namespace App\Contracts;

interface WishlistContract
{
	public function addProductToWishlist($productId);

	public function removeProductFromWishlist($productId);
	
	public function findWishlistByProductId($productId);
}