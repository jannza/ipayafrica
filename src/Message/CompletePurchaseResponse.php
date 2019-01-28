<?php

namespace Omnipay\iPayAfrica\Message;

use Omnipay\Common\Message\AbstractResponse;

class CompletePurchaseResponse extends AbstractResponse
{
    const STATUS_SUCCESSFUL = 'aei7p7yrx4ae34';
    const STATUS_FAILED = 'fe2707etr5s4wq';
    const STATUS_PENDING = 'bdi6p2yy76etrs';
    const STATUS_USED = 'cr5i3pgy9867e1';
    const STATUS_MORE = 'eq3i7p5yt7645e';
    const STATUS_LESS = 'dtfi4p7yty45wq';

    protected $request_data;
    
    public function __construct($request, $status)
    {
        $this->request = $request;
        $this->status = $status;
        $this->request_data = $this->request->getRequestData();
    }

    
    public function isSuccessful()
    {
        return  ($this->getStatus() == self::STATUS_SUCCESSFUL);
    }

    public function isPending()
    {
        return  ($this->getStatus() == self::STATUS_PENDING);
    }

    public function isFailed()
    {
        return  ($this->getStatus() == self::STATUS_FAILED);
    }

    public function isMore()
    {
        return  ($this->getStatus() == self::STATUS_MORE);
    }

    public function isLess()
    {
        return  ($this->getStatus() == self::STATUS_LESS);
    }

    public function isUsed()
    {
        return  ($this->getStatus() == self::STATUS_USED);
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getPaidAmount()
    {
        return ($this->request_data['mc'] != '' ? $this->request_data['mc'] : '');
    }

    public function getMerchantTranactionId()
    {
        return ($this->request_data['txncd'] != '' ? $this->request_data['txncd'] : '');
    }

    public function getClientName()
    {
        return ($this->request_data['msisdn_id'] != '' ? $this->request_data['msisdn_id'] : '');
    }

    public function getClientPhone()
    {
        return ($this->request_data['msisdn_idnum'] != '' ? $this->request_data['msisdn_idnum'] : '');
    }

    public function getCardMask()
    {
        return ($this->request_data['card_mask'] != '' ? $this->request_data['card_mask'] : '');
    }
}