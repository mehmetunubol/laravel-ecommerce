<?php
namespace App\Services\Cart;

use Carbon\Carbon;
use Cookie;
use Darryldecode\Cart\CartCollection;

/* CartStorageService
* Keeps the Cart data in Cookie and manage it with Laravel Cache mechanism.
* Database table is not use to manage the storage in this class.
* If you want to use Database to keep Cart datas use the CartDBStorageService.php class under the same namespace.
*/
class CartStorageService
{
    private $data = [];
    private $cart_id;

    public function __construct()
    {
        $this->cart_id = \Cookie::get('cart');
        if ($this->cart_id) {
            $this->data = \Cache::get('cart_' . $this->cart_id, []);
        } else {
            $this->cart_id = uniqid();
        }
    }

    public function has($key)
    {
        return isset($this->data[$key]);
    }

    public function get($key)
    {
        return new CartCollection($this->data[$key] ?? []);
    }

    public function put($key, $value)
    {
        $this->data[$key] = $value;
        \Cache::put('cart_' . $this->cart_id, $this->data, Carbon::now()->addDays(30));

        if (!Cookie::hasQueued('cart')) {
            Cookie::queue(
                Cookie::make('cart', $this->cart_id, 60 * 24 * 30)
            );
        }
    }
}