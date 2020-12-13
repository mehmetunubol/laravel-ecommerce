<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use App\Services\Payment\AkbankService;

class AkbankController extends Controller
{
    protected $orderRepository;
    protected $paytr;

    public function __construct(OrderContract $orderRepository, AkbankService $akbank)
    {
        $this->orderRepository = $orderRepository;
        $this->akbank          = $akbank;
    }

    public function paymentRequest(Request $request)
    {
        $params = $this->validate($request, [
            'order'         =>  'required',
            'card_name'     =>  'required',
            'card_number'   =>  'required',
            'end_month'     =>  'required',
            'end_year'      =>  'required',
            'cvc_code'      =>  'required',
        ]);
        $order = $this->orderRepository->findOrderById($params['order']);

        //handle the request params fields all...
        $result = $this->akbank->sendRequest($params, $order);

        if( $result )
        {
            return view('site.payment.akbank.payment-success');
        }

        return redirect()->back();
    }

}
