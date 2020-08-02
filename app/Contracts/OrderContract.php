<?php

namespace App\Contracts;

interface OrderContract
{
    public function storeOrderDetails($params);

    public function listOrders(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function findOrderByNumber($orderNumber);

    public function findOrderById($orderId);

    public function setOrderState($params);

    public function getOrderStates();

    public function setPaymentStatus($params);
}