<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use App\Services\Payment\AkbankService;
use App\Contracts\ProductContract;

class AkbankController extends Controller
{
    protected $orderRepository;
    protected $paytr;
    protected $productRepository;

    public function __construct(OrderContract $orderRepository, AkbankService $akbank, ProductContract $productRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->akbank          = $akbank;
        $this->productRepository          = $productRepository;
    }

    public function paymentRequest(Request $request)
    {
        dd()
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

        if($result === -1)
        {
            redirect()->back()->with('error_message', "Ödeme sunucuları ile bağlantı kurulamıyor. Daha sonra tekrar deneyin.");
        }

        if( $result === true )
        {
            $order->status = "wait_ship";
            $order->payment_status = 1;
            $order->save();

           
            $recentlyViewedIds = array_slice(session()->get('products.recently_viewed'), 0,4);
            
            $recentlyViewed = $this->productRepository->findProductsByIds($recentlyViewedIds);
            

            return view('site.payment.akbank.payment-success')->with([
                'recentlyViewed' =>  $recentlyViewed,
            ]);

        }

        return redirect()->back()->with('error_message', $result);
    }

}
