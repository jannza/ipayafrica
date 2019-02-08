<?php

namespace Omnipay\iPayAfrica\Message;

use Omnipay\iPayAfrica\Message\Request;

class CompletePurchaseRequestTanzania extends CompletePurchaseRequestGeneric
{
    protected $endpoint = 'https://payments.elipa.co.tz/v3/tz/ipn/';
}
