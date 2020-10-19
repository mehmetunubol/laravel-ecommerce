<?php

namespace App\Repositories;

use App\Models\Product;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\ProductContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class ProductRepository
 *
 * @package \App\Repositories
 */
class ProductRepository extends BaseRepository implements ProductContract
{
    use UploadAble;

    /**
     * ProductRepository constructor.
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listProductsWithCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->model::with('categories:name')->get();
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findProductById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param int $ids
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findProductsByIds(array $ids)
    {
        return $this->model::find($ids);
    }

    /**
     * @param array $params
     * @return Product|mixed
     */
    public function createProduct(array $params)
    {
        try {
            $collection = collect($params);

            $featured = $collection->has('featured') ? 1 : 0;
            $status = $collection->has('status') ? 1 : 0;

            $merge = $collection->merge(compact('status', 'featured'));

            $product = new Product($merge->all());

            $product->save();

            if ($collection->has('categories')) {
                $product->categories()->sync($params['categories']);
            }

            if ($collection->has('badges')) {
                $product->badges()->sync($params['badges']);
            }

            return $product;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateProduct(array $params)
    {
        $product = $this->findProductById($params['product_id']);

        $collection = collect($params)->except('_token');

        $featured = $collection->has('featured') ? 1 : 0;
        $status = $collection->has('status') ? 1 : 0;

        $merge = $collection->merge(compact('status', 'featured'));

        $product->update($merge->all());

        if ($collection->has('categories')) {
            $product->categories()->sync($params['categories']);
        }

        if ($collection->has('badges')) {
            $product->badges()->sync($params['badges']);
        }

        return $product;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteProduct($id)
    {
        $product = $this->findProductById($id);

        $product->delete();

        return $product;
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findProductBySlug($slug)
    {
        $product = Product::where('slug', $slug)->first();

        return $product;
    }

        /**
     * @param array $params
     * @return mixed
     */
    public function setProductAdminOrder(array $params)
    {
        $product = $this->findProductById($params['product_id']);
        $product->order = $params['order'];
        $product->save();

        return $product;
    }

    /**
     * @param $id
     * @return similarProducts
     */
    public function findSimilarProducts($id)
    {
        $product = $this->model::with('categories')->findOrFail($id);

        $categoryIds = $product->categories->pluck('id')->toArray();
        $similarProducts = $this->model::whereHas('categories', function ($query) use ($categoryIds) {
                                                    return $query->whereIn('category_id', $categoryIds);
                                                })
                            ->where('id', "!=" ,$product->id)
                            ->limit(5)
                            ->get();
        return $similarProducts;
    }

    /**
     * @param $search
     * @return products
     */
    public function searchAllProducts($search = null)
    {
        $searchQueues = explode(" ", $search);

        foreach($searchQueues as $i => $text) 
        {
            if($i == 0) 
            {
                $products = $this->model::where('name', 'LIKE', "%{$text}%") 
                                        ->orWhere('description', 'LIKE', "%{$text}%");
            }
            else
            {
                $products = $products->where('name', 'LIKE', "%{$text}%") 
                                     ->orWhere('description', 'LIKE', "%{$text}%");
            }
        }
        
        return $products->get();
    }
}