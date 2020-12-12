<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use App\Services\AkbankService;

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
        //handle the request params fields all...
        $this->akbank->sendRequest();

    }

}
