<?php

namespace App\Repositories;

use App\Models\SiteSearch;
use App\Contracts\SiteSearchContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Log;
/**
 * Class CategoryRepository
 *
 * @package \App\Repositories
 */
class SiteSearchRepository extends BaseRepository implements SiteSearchContract
{

    /**
     * CategoryRepository constructor.
     * @param SiteSearch $model
     */
    public function __construct(SiteSearch $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listSiteSearchs(string $sort = 'id', array $columns = ['*'])
    {
        return $this->all($columns, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findSiteSearchById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param $text
     * @return mixed
     */
    public function findSiteSearchByText($search)
    {
        return SiteSearch::where('search', $search['search'])->where('type', $search['type'])->first();   
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteSiteSearch($id)
    {
        $site_page = $this->findSiteSearchById($id);

        $site_page->delete();

        return $site_page;
    }
    
    /**
     * @param $params
     * @return SiteSearch|mixed
     */
    public function addSiteSearch($params)
    {
        $siteSearchRecord = $this->findSiteSearchByText($params);

        if(isset($siteSearchRecord))
        {
            $siteSearchRecord->count        = $siteSearchRecord->count + 1;
            $siteSearchRecord->results      = $params['results'];
            $siteSearchRecord->result_ids   = $params['result_ids'];
        }
        else
        {
            $siteSearchRecord = new SiteSearch($params);

            $siteSearchRecord->search       = strtolower( $params['search'] );
            $siteSearchRecord->result_ids   = $params['result_ids'];
        }

        $siteSearchRecord->save();

        return $siteSearchRecord;
    }
}