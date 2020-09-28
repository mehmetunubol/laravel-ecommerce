<?php

namespace App\Repositories;

use App\Models\Address;
use App\Contracts\AddressContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class AddressRepository extends BaseRepository implements AddressContract
{
	/**
     * AttributeRepository constructor.
     * @param Attribute $model
     */
    public function __construct(Address $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listAddress()
    {
    	return auth()->user()->addresses;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findAddressById(int $id)
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
    public function createAddress(array $params)
    {
    	try {
            $collection = collect($params);

            $user_id = auth()->user()->id;

            $is_default = $collection->has('is_default') ? 1 : 0;

            $merge = $collection->merge(compact('is_default', 'user_id'));

            $address = new Address($merge->all());
            $address->save();

            return $address;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateAddress(array $params)
    {
    	$address = $this->findAddressById($params['id']);

        $collection = collect($params)->except('_token');

        $is_default = $collection->has('is_default') ? 1 : 0;

        $merge = $collection->merge(compact('is_default'));

        $address->update($merge->all());

        return $address;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteAddress($id)
    {
    	$address = $this->findAddressById($id);

        $address->delete();

        return $address;
    }

}