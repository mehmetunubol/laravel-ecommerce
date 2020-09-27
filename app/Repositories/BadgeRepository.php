<?php

namespace App\Repositories;

use App\Models\Badge;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\BadgeContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class BadgeRepository
 *
 * @package \App\Repositories
 */
class BadgeRepository extends BaseRepository implements BadgeContract
{

    /**
     * BadgeRepository constructor.
     * @param Badge $model
    */
    public function __construct(Badge $model)
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
    public function listBadges(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
    */
    public function findBadgeById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param array $params
     * @return Badge|mixed
     */
    public function createBadge(array $params)
    {
        try {
            $collection = collect($params);
            

            $status = $collection->has('status') ? 1 : 0;

            $merge = $collection->merge(compact('status'));

            $category = new Badge($merge->all());

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
    public function updateBadge(array $params)
    {
        $category = $this->findBadgeById($params['id']);

        $collection = collect($params)->except('_token');

        $status = $collection->has('status') ? 1 : 0;

        $merge = $collection->merge(compact('status'));

        $category->update($merge->all());

        return $category;
    }

    /**
     * @param $id
     * @return bool|mixed
    */
    public function deleteBadge($id)
    {
        $category = $this->findBadgeById($id);

        $category->delete();

        return $category;
    }

}