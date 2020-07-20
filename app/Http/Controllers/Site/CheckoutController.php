<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getCheckout()
    {
        return view('site.pages.checkout');
    }

    public function placeOrder(Request $request)
    {
        // Before storing the order we should implement the
        // request validation TODO
        $order = $this->orderRepository->storeOrderDetails($request->all());

        // You can add more control here to handle if the order
        // is not stored properly
        if ($order) {
            dd($order);
            // TODO: Payment
            # $this->payPal->processPayment($order);
        }

        return redirect()->back()->with('message','Order not placed');
    }

    public function complete(Request $request)
    {
        // TODO: Payment
        /* $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $status = $this->payPal->completePayment($paymentId, $payerId);
        */

        $order = Order::where('order_number', $status['invoiceId'])->first();
        $order->status = 'processing';
        $order->payment_status = 1;
        $order->payment_method = 'PayPal -'.// TODO: Payment $status['salesId'];
        $order->save();

        Cart::clear();
        return view('site.pages.success', compact('order'));
    }
}