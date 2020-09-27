<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use App\Services\PaytrService;

class PaytrController extends Controller
{
    protected $orderRepository;
    protected $paytr;

    public function __construct(OrderContract $orderRepository, PaytrService $paytr)
    {
        $this->orderRepository = $orderRepository;
        $this->paytr           = $paytr;
    }

    public function successfulAttempt()
    {
        $order = $this->orderRepository->findOrderById($_GET['order']);
        $order = $this->orderRepository->setOrderState(['number'=> $order->order_number, 'state' => 'wait_pay_confirm']);
        return view('site.payment.paytr.succeeded-attempt');
    }
    public function failedAttempt()
    {
        return view('site.payment.paytr.failed-attempt');
    }
    public function paymentResult(Request $request)
    {
        $params = $request->all();
        $order = $this->orderRepository->findOrderById($params['merchant_oid']);

        $status = $this->paytr->getPaymentResultStatus($params, $order);

        if ($status == 'success')
        {
            $order = $this->orderRepository->setOrderState(['number'=> $order->order_number, 'state' => 'wait_shipping']);
            echo 'OK';
        }
        else if ($status == 'already_confirmed')
        {
            echo 'OK';
        }
        else if ($status == "bad_hash")
        {
            $order = $this->orderRepository->setOrderState(['number'=> $order->order_number, 'state' => 'wait_payment']);
            die('PAYTR notification failed: bad hash');
        }
        else
        { // Payment failed
            $order = $this->orderRepository->setOrderState(['number'=> $order->order_number, 'state' => 'wait_payment']);
            LOG::info("Payment is FAILED for the order : " . $order->order_number);
            LOG::info("failed_reason_code: " .$params['failed_reason_code']);
            LOG::info("failed_reason_msg: " .$params['failed_reason_msg']);
            echo 'OK';
        }
        exit;
    }
}
