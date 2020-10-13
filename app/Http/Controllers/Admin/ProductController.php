<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Contracts\BadgeContract;
use App\Http\Controllers\BaseController;
use App\Http\Requests\StoreProductFormRequest;

class ProductController extends BaseController
{
    protected $brandRepository;

    protected $categoryRepository;

    protected $productRepository;

    protected $badgeRepository;

    public function __construct(
        BrandContract $brandRepository,
        CategoryContract $categoryRepository,
        ProductContract $productRepository,
        BadgeContract $badgeRepository
    )
    {
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->badgeRepository = $badgeRepository;
    }

    public function index()
    {
        $products = $this->productRepository->listProducts();

        $this->setPageTitle('Products', 'Products List');
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');
        $badges = $this->badgeRepository->listBadges('name','asc');

        $this->setPageTitle('Products', 'Create Product');
        return view('admin.products.create', compact('categories', 'brands', 'badges'));
    }

    public function store(StoreProductFormRequest $request)
    {
        $params = $request->except('_token');

        $product = $this->productRepository->createProduct($params);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while creating product.', 'error', true, true);
        }

        return $this->responseRedirectWithParams('admin.products.edit', ['id' => $product->id], 'Product added successfully' ,'success',false, false);
    }

    public function edit($id)
    {
        $product = $this->productRepository->findProductById($id);
        $brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');
        $badges = $this->badgeRepository->listBadges('name','asc');

        $this->setPageTitle('Products', 'Edit Product');
        return view('admin.products.edit', compact('categories', 'brands', 'badges', 'product'));
    }

    public function update(StoreProductFormRequest $request)
    {
        $params = $request->except('_token');

        $product = $this->productRepository->updateProduct($params);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while updating product.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product updated successfully' ,'success',false, false);
    }

    public function delete(Request $request)
    {
        $product = $this->productRepository->deleteProduct($request['id']);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while deleting product.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product deleted successfully' ,'success',false, false);
    }

    public function order_index()
    {
        $products = $this->productRepository->listProductsWithCategories('id', 'asc');
        $this->setPageTitle('Products Order', 'Tabloda kategori bazında arama yapabilir ve ürünlerin müşterilere hangi sıra ile gösterileceğini görüp düzenleyebilirsiniz.');
        return view('admin.products.index_order', compact('products'));
    }

    public function set_order(Request $request)
    {
        $product = $this->productRepository->setProductAdminOrder($request->except('_token'));
        if (!$product) {
            return $this->responseRedirectBack('Error occurred while updating product order.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.order', 'Product('.$product->id.') order updated successfully' ,'success',false, false);
    }
}