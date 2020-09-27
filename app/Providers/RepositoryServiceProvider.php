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
use App\Contracts\SitePageContract;
use App\Repositories\SitePageRepository;
use App\Contracts\ProductStatsContract;
use App\Repositories\ProductStatsRepository;
use App\Contracts\AddressContract;
use App\Repositories\AddressRepository;
use App\Contracts\BadgeContract;
use App\Repositories\BadgeRepository;
use App\Contracts\SiteSearchContract;
use App\Repositories\SiteSearchRepository;

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
        SitePageContract::class         =>          SitePageRepository::class,
        ProductStatsContract::class     =>          ProductStatsRepository::class,
        AddressContract::class          =>          AddressRepository::class,
        BadgeContract::class            =>          BadgeRepository::class,
        SiteSearchContract::class       =>          SiteSearchRepository::class,
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