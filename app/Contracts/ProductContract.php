<?php

namespace App\Contracts;

/**
 * Interface ProductContract
 * @package App\Contracts
 */
interface ProductContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*']);
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listProductsWithCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findProductById(int $id);

    /**
     * @param int $ids
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findProductsByIds(array $ids);

    /**
     * @param array $params
     * @return mixed
     */
    public function createProduct(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateProduct(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteProduct($id);

    /**
     * @param $slug
     * @return mixed
     */
    public function findProductBySlug($slug);

    /**
     * @param $id
     * @return similarProducts
     */
    public function findSimilarProducts($id);

    /**
     * @param $search
     * @return products
     */
    public function searchAllProducts($search = null);
}