<?php

namespace App\Services\Payment;

use Spatie\ArrayToXml\ArrayToXml;
use Illuminate\Support\Facades\Http;

class AkbankService
{
    private $postUrl = "https://entegrasyon.asseco-see.com.tr/fim/api";
    private $terminalId = "AKTESTAPI";
    private $password = "*****";
    private $clientId = "*****";
    private $mode = "****";
    private $transactionType = "Auth";
    private $currencyCode = "949";
    private $userId;
    private $order;
    private $params;

    public function sendRequest($params, $order)
    {
        $this->order = $order;
        $this->params = $params;
        dd($this->getPostOptions());
        $response = Http::post($this->postUrl, $this->getPostOptions());
        return $response;
    }

    protected function getPostOptions()
    {
        return [
            'form_params' => [
                'DATA' => $this->generateXml()
            ]
        ];
    }

    protected function generateXml()
    {
        $params = [
            'Name' => $this->terminalId,
            'Password' => $this->password,
            'ClientId' => $this->clientId,
            'IPAddress' => $this->order['ip'], // not mandatory field, It is null for us
            'Mode' => $this->mode,
            'OrderId' => $this->order['id'],
            'Type' => $this->transactionType,
            'Number' => $this->params['card_number'],
            'Expires' => $this->params['end_month'] . '/'. $this->params['end_year'],
            'Cvv2Val' => $this->params['cvc_code'],
            'Total' => $this->order['grand_total'],
            'UserId' => $this->clientId,
            'Currency' => $this->currencyCode,
            'email' => $this->order->user->email,
            //'Taksit' => $this->order['installment'],
            'BillTo' => [
                'Name' => $this->order->billingAddress->address,
                'Street1' => $this->order->billingAddress->district,
                'City' => $this->order->billingAddress->city,
                'PostalCode' => $this->order->billingAddress->postalCode, // we dont have it    it is null
                'Country' => $this->order->billingAddress->country,
                'TelVoice' => $this->order->billingAddress->phone,
            ],
            'ShipTo' => [
                'Name' => $this->order->deliveryAddress->address,
                'Street1' => $this->order->deliveryAddress->district,
                'City' => $this->order->deliveryAddress->city,
                'PostalCode' => $this->order->deliveryAddress->postalCode, // we dont have it    it is null
                'Country' => $this->order->deliveryAddress->country,
                'TelVoice' => $this->order->deliveryAddress->phone,
            ],
            'extra' => '',
        ];
    
        return ArrayToXml::convert($params, 'CC5Request', true, 'UTF-8');
    }
    /*
    *   Returns true if payment is successful
    *   else returns false.
    */
    public function getPaymentResultStatus($post, $order)
    {

    }
}