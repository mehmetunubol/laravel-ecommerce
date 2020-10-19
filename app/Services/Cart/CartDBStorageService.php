<?php
namespace App\Services\Cart;

/* CartDBStorageService 
******* This class is not functional for now !
******* Cookie and Caching mechanism is active (CartStorageService)
*
* Keeps the Cart data in the database.
* Model: CartStorageModel.php
* Migration: 2020_09_30_155953_create_cart_storage_table
* 
* Database table is not use to manage the storage in this class.
*
*** Note: user_id column is added later, so the functionality of this column is not implemented.
*/


class CartDBStorageService {

    public function has($key)
    {
        return DatabaseStorageModel::find($key);
    }

    public function get($key)
    {
        if($this->has($key))
        {
            return new CartCollection(DatabaseStorageModel::find($key)->cart_data);
        }
        else
        {
            return [];
        }
    }

    public function put($key, $value)
    {
        if($row = DatabaseStorageModel::find($key))
        {
            // update
            $row->cart_data = $value;
            $row->save();
        }
        else
        {
            DatabaseStorageModel::create([
                'id' => $key,
                'cart_data' => $value
            ]);
        }
    }
}