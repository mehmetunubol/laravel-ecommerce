<?php

namespace App\Repositories;

use App\Models\Category;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\CategoryContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CategoryRepository
 *
 * @package \App\Repositories
 */
class CategoryRepository extends BaseRepository implements CategoryContract
{
    use UploadAble;

    /**
     * CategoryRepository constructor.
     * @param Category $model
    */
    public function __construct(Category $model)
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
    public function listCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function getMainCategories()
    {
        return Category::where('parent_id',1)->get();
    }
    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
    */
    public function findCategoryById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param array $params
     * @return Category|mixed
     */
    public function createCategory(array $params)
    {
        try {
            $collection = collect($params);
            
            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'categories');
            }

            $featured = $collection->has('featured') ? 1 : 0;
            $menu = $collection->has('menu') ? 1 : 0;

            $merge = $collection->merge(compact('menu', 'image', 'featured'));

            $category = new Category($merge->all());

            $category->save();

            return $category;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
    */
    public function updateCategory(array $params)
    {
        $category = $this->findCategoryById($params['id']);

        $collection = collect($params)->except('_token');

        $image = null;
        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            if ($category->image != null) {
                $this->deleteOne($category->image);
            }

            $image = $this->uploadOne($params['image'], 'categories');
        }

        $featured = $collection->has('featured') ? 1 : 0;
        $menu = $collection->has('menu') ? 1 : 0;

        $merge = $collection->merge(compact('menu', 'image', 'featured'));

        $category->update($merge->all());

        return $category;
    }

    /**
     * @param $id
     * @return bool|mixed
    */
    public function deleteCategory($id)
    {
        $category = $this->findCategoryById($id);

        if ($category->image != null) {
            $this->deleteOne($category->image);
        }

        $category->delete();

        return $category;
    }

    /**
     * @return mixed
     */
    public function treeList()
    {
        /*
            The nest() and listFlattened() methods are provided by the NestedCollection package we installed earlier.

            Next, we will use the treeList() method in our Admin\CategoryController instead of listCategories().
        */
        return Category::orderByRaw('-name ASC')
            ->get()
            ->nest()
            ->listsFlattened('name');
    }

    public function findBySlugWithOrderFilter($slug, $order = null, $filter = null)
    {
        /**
         * Seperation of the product and attribute filters
         * 
         */
        $product_filter = [];
        $attr_filter = [];
        foreach ($filter as $each_filter) {
            if($each_filter[0] === 'price')
            {
                array_push($product_filter, $each_filter);
            }
            else
            {
                array_push($attr_filter, $each_filter);
            }
        }
        // End of Seperation of the product and attribute filters

        /**
         * Preperation of the closure which will be used in Model query.
         */
        $closure = function ($products) use($order, $product_filter, $attr_filter) 
        {
            $return_value;
            if(isset($order))
            {
                $return_value = $products->orderBy($order['column'], $order['type']);
            }
            else
            {
                /* 
                    It is default order of products. It is configurable from admin panel.
                    It will be applicable if and only if 'customer' does not select any order.
                    If there is no configurable value for the column 'order', products will be sorted by id desc.
                */
                $return_value = $products->orderBy('order', 'desc')->orderBy('id', 'desc');
            }

            if ($product_filter)
            {
                $return_value = $return_value->where($product_filter);
            }

            if($attr_filter)
            {
                $return_value = $return_value->whereHas('attributes' , 
                                                    function ($attrs) use($attr_filter)
                                                    {
                                                        $attr_returned_val = $attrs->where(
                                                            function($q) use($attr_filter){
                                                                $r;
                                                                foreach ($attr_filter as $i => $value) {
                                                                    $r = $q->orWhere('value', $value);
                                                                }
                                                            }
                                                        );
                                                    }); 
            }
        };
        // End of Preperation of the closure

        return Category::with(['products' => $closure])
            ->where('slug', $slug)
            ->where('menu', 1)
            ->first();
    }
}