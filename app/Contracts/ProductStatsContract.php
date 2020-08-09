<?php

namespace App\Contracts;

/**
 * Interface ProductContract
 * @package App\Contracts
 */
interface ProductStatsContract
{
    /**
     * @param $product_id, $type
     * @return mixed
     */
    public function incrementProductStats($product_id, $type);

    /**
     * @param string $type
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listStatistics(string $type = 'view', string $order = 'count', string $sort = 'desc', array $columns = ['*']);
}