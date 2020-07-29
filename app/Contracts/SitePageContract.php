<?php

namespace App\Contracts;

/**
 * Interface SitePageContract
 * @package App\Contracts
 */
interface SitePageContract
{
    /**
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listSitePages(string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findSitePageById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createSitePage(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateSitePage(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteSitePage($id);

    /**
     * @param $slug
     * @return mixed
     */
    public function findSitepageBySlug($slug);
}