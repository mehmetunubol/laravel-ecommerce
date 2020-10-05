<?php

namespace App\Repositories;

use App\Models\User;
use App\Contracts\UserContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class UserRepository
 *
 * @package \App\Repositories
 */
class UserRepository extends BaseRepository implements UserContract
{
    /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listUsers(string $sort = 'id', array $columns = ['*'])
    {
        return $this->all($columns, $sort);
    }

    public function getUserEmailsArray()
    {
        return $this->all()->pluck('email')->toArray();
    }
    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findUserById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateUser(array $params)
    {
        $user = $this->findUserById($params['user_id']);

        $user->update($params);

        return $user;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteUser($id)
    {
        $user = $this->findUserById($id);
        $user->delete();

        return $user;
    }

}