<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\ProductStatsContract;
use App\Http\Controllers\BaseController;

class ProductStatsController extends BaseController
{
    protected $productStatsRepository;

    public function __construct(
        ProductStatsContract $productStatsRepository
    )
    {
        $this->productStatsRepository = $productStatsRepository;
    }

    public function view_index()
    {
        $stats = $this->productStatsRepository->listStatistics('view');

        $this->setPageTitle('View Statistics', 'Product View Statistics');
        return view('admin.statistics.product.index', compact('stats'));
    }

    public function cart_index()
    {
        $stats = $this->productStatsRepository->listStatistics('cart');

        $this->setPageTitle('Cart Statistics', 'Product Cart Statistics');
        return view('admin.statistics.product.index', compact('stats'));
    }

    public function order_index()
    {
        $stats = $this->productStatsRepository->listStatistics('order');

        $this->setPageTitle('Order Statistics', 'Product Order Statistics');
        return view('admin.statistics.product.index', compact('stats'));
    }
}