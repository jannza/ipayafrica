<?php

namespace Omnipay\iPayAfrica\Message;

use Omnipay\iPayAfrica\Message\Request;

class CompletePurchaseRequestGeneric extends Request
{

    public function getData()
    {
        $params = $this->getRequestData();
        $data = array
        (
            'vendor' => $this->getUsername(),
            'ivm' => $params['ivm'],
            'qwh' => $params['qwh'],
            'afd' => $params['afd'],
            'poi' => $params['poi'],
            'uyt' => $params['uyt'],
            'ifd' => $params['ifd'],
        );
        return $data;
    }

    public function getRequestData()
    {
        $params = $this->httpRequest->query->all();
        return $params;
    }

    public function sendData($data)
    {
        try {        
            $httpResponse = $this->httpClient->post($this->getEndpoint().'?'.http_build_query($this->getData()))->send();
        } catch (Exception $e) {
            error_log(__FILE__.'@'.__LINE__.': '.$e->getMessage());
        }
        return new CompletePurchaseResponse($this, $httpResponse->getBody());
    }

}
