<?php

namespace App\Contracts;

/**
 * Interface BadgeContract
 * @package App\Contracts
 */
interface BadgeContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listBadges(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findBadgeById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createBadge(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateBadge(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteBadge($id);

}