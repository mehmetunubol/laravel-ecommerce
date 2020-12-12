<?php

namespace App\Services\Payment;

use Spatie\ArrayToXml\ArrayToXml;

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

    public function sendRequest()
    {
        $client = new GuzzleHttp\Client();
        $response = $client->post($this->getPostUrl(), $this->getPostOptions());
    
        return $this->formatResponse($response);
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
            'IPAddress' => $this->order['ip'],
            'Mode' => $this->mode,
            'OrderId' => $this->order['id'],
            'Type' => $this->transactionType,
            'Number' => $this->order['card_number'],
            'Expires' => $this->order['expire_mounth_year'],
            'Cvv2Val' => $this->order['cvv'],
            'Total' => $this->order['grand_total'],
            'UserId' => $this->clientId,
            'Currency' => $this->currencyCode,
            'email' => $this->order->user()['email'], // need user email ?
            'Taksit' => $this->order['installment'], // ? need taksit?
            'BillTo' => [
                'Name' => $this->userId,
                'Street1' => $this->userId,
                'City' => $this->userId,
                'PostalCode' => $this->userId,
                'Country' => $this->userId,
                'TelVoice' => $this->userId,
            ],
            'ShipTo' => [
                'Name' => $this->userId,
                'Street1' => $this->userId,
                'City' => $this->userId,
                'PostalCode' => $this->userId,
                'Country' => $this->userId,
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