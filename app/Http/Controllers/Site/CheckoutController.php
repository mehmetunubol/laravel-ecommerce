<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;
use App\Services\PaytrService;

class CheckoutController extends Controller
{
    protected $orderRepository;
    protected $paytr;

    public function __construct(OrderContract $orderRepository, PaytrService $paytr)
    {
        $this->orderRepository = $orderRepository;
        $this->paytr           = $paytr;
    }

    public function getCheckout()
    {
        $addresses = auth()->user()->addresses;        
        return view('site.pages.checkout', compact('addresses'));
    }

    public function placeOrder(Request $request)
    {

		
        $params = $this->validate($request, [
            'delivery_address'    =>  'required',
            'payment_method'       =>  'required',
            'billing_address'     =>  'required',
            'form1_accept'     =>  'required',
            'form2_accept'     =>  'required'
        ]);
		return view('site.payment.credit-card.checkout-pay')->with('total', \Cart::getSubTotal());

        $payment = $request->payment_method;
        $order = $this->orderRepository->storeOrderDetails($request->all());

        if (!isset($order)) {
            return redirect()->back()->with('message','Order not placed');
        }
        $order = $this->orderRepository->setOrderState(['number'=> $order->order_number, 'state' => 'wait_payment']);
		
        
        // Redirect to Payment Screen
        if($payment == 'paytr')
        {
            $token = $this->paytr->getToken($order);
            return view('site.payment.paytr.index', compact('token'));
        } else if ( $payment == 'akbank') // TODO: need to set it on frontend
        {
            return view('site.payment.credit-card.checkout-pay')->with('total', \Cart::getSubTotal());
        }

        return redirect()->back()->with('message','Not Found : Payment method');
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
        $this->orderRepository->setOrderState(['number'=> $order->order_number, 'state' => 'wait_ship']);

        Cart::clear();
        return view('site.pages.success', compact('order'));
    }
}