<?php

namespace App\Contracts;

interface AddressContract
{
    /**
     * @return mixed
     */
    public function listAddress();

    /**
     * @param int $id
     * @return mixed
     */
    public function findAddressById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createAddress(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateAddress(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteAddress($id);
}