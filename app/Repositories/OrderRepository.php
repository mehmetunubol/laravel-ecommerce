<?php

namespace App\Repositories;

use Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Contracts\OrderContract;

class OrderRepository extends BaseRepository implements OrderContract
{
    private $defined_states = ['pending', 'wait_payment', 'wait_pay_confirm', 'wait_ship', 'declined', 'shipping','completed', 'return_shipping', 'returned'];

    public function __construct(Order $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function storeOrderDetails($params)
    {
        $order = Order::create([
            'order_number'      =>  'ORD-'.strtoupper(uniqid()),
            'user_id'           =>  auth()->user()->id,
            'status'            =>  'pending',
            'grand_total'       =>  Cart::getSubTotal(),
            'item_count'        =>  Cart::getTotalQuantity(),
            'payment_status'    =>  0,
            'delivery_address'    =>  $params['delivery_address'],
            'billing_address'    =>  $params['billing_address'],
            'payment_method'    =>  $params['payment_method'],
            'notes'             =>  $params['notes']
        ]);
    
        if ($order) {
    
            $items = Cart::getContent();
    
            foreach ($items as $item)
            {
                // A better way will be to bring the product id with the cart items
                // you can explore the package documentation to send product id with the cart
                $product = Product::where('name', $item->name)->first();
    
                $orderItem = new OrderItem([
                    'product_id'    =>  $product->id,
                    'quantity'      =>  $item->quantity,
                    'price'         =>  $item->getPriceSum()
                ]);
    
                $order->items()->save($orderItem);
            }
        }
    
        return $order;
    }

    public function listOrders(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function listTransfers()
    {
        return Order::where('payment_method', 'transfer')->get();
    }

    public function findOrderByNumber($orderNumber)
    {
        return Order::where('order_number', $orderNumber)->first();
    }
    
    public function findOrderById($orderId)
    {
        return Order::where('id', $orderId)->first();
    }

    public function setOrderState($params)
    {
        $order = $this->findOrderByNumber($params['number']);
        if(false == in_array($params['state'], $this->defined_states))
        {
            throw new InvalidArgumentException("Given state is not predefined!");
        }
        $order->status = $params['state'];

        if ( $params['state'] === "wait_pay_confirm" || "wait_ship" )
        {
            $order->payment_status = 1;
        }
        $order->save();
        return $order;
    }

    public function getOrderStates()
    {
        return $this->defined_states;
    }

    public function setPaymentStatus($params)
    {
        $order = $this->findOrderByNumber($params['id']);
        $order->payment_status = $params['status'];
        $order->save();
        return $order;
    }
}