<?php

namespace App\Repositories;

use App\Models\ProductStats;
use App\Contracts\ProductStatsContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class ProductRepository
 *
 * @package \App\Repositories
 */
class ProductStatsRepository extends BaseRepository implements ProductStatsContract
{
    /**
     * ProductRepository constructor.
     * @param ProductStats $model
     */
    public function __construct(ProductStats $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $type
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listStatistics(string $type = 'view', string $order = 'count', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort)->where('type', $type);
    }


    /**
     * @param $product_id, $type
     * @return mixed
     */
    public function incrementProductStats($product_id, $type)
    {
        $product_stat = ProductStats::where('product_id', $product_id)->where('type', $type)->first();
        if (isset($product_stat))
        {
            $product_stat->count++;
        }
        else
        {
            $product_stat = new ProductStats([
                'product_id'    => $product_id,
                'type'          => $type,
                'count'         => 1,
            ]);
        }
        $product_stat->save();
        return $product_stat;
    }
}