<?php

namespace App\Contracts;

/**
 * Interface SiteSearchContract
 * @package App\Contracts
 */
interface SiteSearchContract
{
    /**
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listSiteSearchs(string $order = 'count', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findSiteSearchById(int $id);

        /**
     * @param int $text
     * @return mixed
     */
    public function findSiteSearchByText(int $text);

    /**
     * @param $id
     * @return bool
     */
    public function deleteSiteSearch($id);

    /**
     * @param array $params
     * @return mixed
     */
    public function addSiteSearch(array $params);

}