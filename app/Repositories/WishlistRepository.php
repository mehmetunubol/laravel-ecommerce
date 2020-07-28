<?php

namespace App\Repositories;

use App\Models\Wishlist;
use App\Contracts\WishlistContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class WishlistRepository extends BaseRepository implements WishlistContract
{
}