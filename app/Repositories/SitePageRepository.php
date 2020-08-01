<?php

namespace App\Repositories;

use App\Models\SitePage;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\SitePageContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Log;
/**
 * Class CategoryRepository
 *
 * @package \App\Repositories
 */
class SitePageRepository extends BaseRepository implements SitePageContract
{
    use UploadAble;

    /**
     * CategoryRepository constructor.
     * @param SitePage $model
     */
    public function __construct(SitePage $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listSitePages(string $sort = 'id', array $columns = ['*'])
    {
        return $this->all($columns, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findSitePageById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    public function findSitepageBySlug($slug)
    {
        $sitepage = SitePage::where('slug', $slug)->first();
        return $sitepage;
    }

    /**
     * @param array $params
     * @return SitePage|mixed
     */
    public function createSitePage(array $params)
    {
        try {
            $collection = collect($params);

            $logo = null;

            if ($collection->has('logo') && ($params['logo'] instanceof  UploadedFile)) {
                $logo = $this->uploadOne($params['logo'], 'site_pages');
            }

            $show_in_header = $collection->has('show_in_header') ? 1 : 0;
            $show_in_footer = $collection->has('show_in_footer') ? 1 : 0;
            $merge = $collection->merge(compact('logo', 'show_in_footer', 'show_in_header'));
            Log::info("params: " . $collection);
            Log::info(" : SitePage merge : " .$merge);

            $site_page = new SitePage($merge->all());
            $site_page->save();

            return $site_page;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateSitePage(array $params)
    {
        $site_page = $this->findSitePageById($params['id']);
        Log::info($site_page);

        $collection = collect($params)->except('_token');

        $logo = null;
        if ($collection->has('logo') && ($params['logo'] instanceof  UploadedFile)) {

            if ($site_page->logo != null) {
                $this->deleteOne($site_page->logo);
            }

            $logo = $this->uploadOne($params['logo'], 'site_pages');
        }

        $show_in_header = $collection->has('show_in_header') ? 1 : 0;
        $show_in_footer = $collection->has('show_in_footer') ? 1 : 0;

        $merge = $collection->merge(compact('logo','show_in_header', 'show_in_footer'));

        $site_page->update($merge->all());        

        return $site_page;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteSitePage($id)
    {
        $site_page = $this->findSitePageById($id);

        if ($site_page->logo != null) {
            $this->deleteOne($site_page->logo);
        }

        $site_page->delete();

        return $site_page;
    }
}