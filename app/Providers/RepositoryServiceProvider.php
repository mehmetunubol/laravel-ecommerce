<?php

namespace App\Providers;

use App\Contracts\CategoryContract;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Contracts\AttributeContract;
use App\Repositories\AttributeRepository;
use App\Contracts\BrandContract;
use App\Repositories\BrandRepository;
use App\Contracts\ProductContract;
use App\Repositories\ProductRepository;
use App\Contracts\OrderContract;
use App\Repositories\OrderRepository;
use App\Contracts\UserContract;
use App\Repositories\UserRepository;
use App\Contracts\WishlistContract;
use App\Repositories\WishlistRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        CategoryContract::class         =>          CategoryRepository::class,
        AttributeContract::class        =>          AttributeRepository::class,
        BrandContract::class            =>          BrandRepository::class,
        ProductContract::class          =>          ProductRepository::class,        
        OrderContract::class            =>          OrderRepository::class,
        UserContract::class             =>          UserRepository::class,
        WishlistContract::class         =>          WishlistRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }
}