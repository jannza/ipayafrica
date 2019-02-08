<?php

namespace Omnipay\iPayAfrica\Message;

use Omnipay\iPayAfrica\Message\Request;

class CompletePurchaseRequestKenya extends CompletePurchaseRequestGeneric
{
    protected $endpoint = 'https://www.ipayafrica.com/ipn/';
}
