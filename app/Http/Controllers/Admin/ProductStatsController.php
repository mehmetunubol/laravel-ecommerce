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

        $this->setPageTitle('Ürün Görüntülenmeleri', 'Ürünlerin kaç defa görüntülendiğini gösterir');
        return view('admin.statistics.product.index', compact('stats'));
    }

    public function cart_index()
    {
        $stats = $this->productStatsRepository->listStatistics('cart');

        $this->setPageTitle('Sepete eklenmeler', 'Ürünlerin kaç defa sepete eklendiğini gösterir');
        return view('admin.statistics.product.index', compact('stats'));
    }

    public function order_index()
    {
        $stats = $this->productStatsRepository->listStatistics('order');

        $this->setPageTitle('Sipariş Sayıları', 'Ürünlerin kaç kere sipariş edildiğini gösterir');
        return view('admin.statistics.product.index', compact('stats'));
    }
}