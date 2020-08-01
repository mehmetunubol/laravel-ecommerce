<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use App\Http\Controllers\BaseController;

class OrderController extends BaseController
{
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->listOrders();
        $this->setPageTitle('Orders', 'List of all orders');
        return view('admin.orders.index', compact('orders'));
    }

    public function show($orderNumber)
    {
        $order = $this->orderRepository->findOrderByNumber($orderNumber);

        $this->setPageTitle('Order Details', $orderNumber);
        return view('admin.orders.show', compact('order'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($number)
    {
        $order = $this->orderRepository->findOrderByNumber($number);
        $states = $this->orderRepository->getOrderStates();
        $this->setPageTitle('Orders', 'Edit Order : '.$order->number);
        return view('admin.orders.edit', compact('order', 'states'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'state'      =>  'required',
            'number'      =>  'required',
        ]);

        $params = $request->except('_token');

        $order = $this->orderRepository->setOrderState($params);

        if (!$order) {
            return $this->responseRedirectBack('Error occurred while updating order.', 'error', true, true);
        }
        return $this->responseRedirectBack('Order updated successfully' ,'success',false, false);
    }
}