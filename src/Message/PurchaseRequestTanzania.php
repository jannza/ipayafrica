<?php

namespace Omnipay\iPayAfrica\Message;

use Omnipay\iPayAfrica\Message\PurchaseRequestGeneric;

class PurchaseRequestTanzania extends PurchaseRequestGeneric
{
    
    protected $endpoint = 'https://payments.elipa.co.tz/v3/tz';
    
    public function getMpesa()
    {
        return (int)$this->getParameter('mpesa');
    }

    public function setMpesa($value)
    {
        return $this->setParameter('mpesa', $value);
    }

    public function getAirtel()
    {
        return (int)$this->getParameter('airtel');
    }

    public function setAirtel($value)
    {
        return $this->setParameter('airtel', $value);
    }

    public function getMobileBanking()
    {
        return (int)$this->getParameter('mobilebanking');
    }

    public function setMobileBanking($value)
    {
        return $this->setParameter('mobilebanking', $value);
    }

    public function getDebitCard()
    {
        return (int)$this->getParameter('debitcard');
    }

    public function setDebitCard($value)
    {
        return $this->setParameter('debitcard', $value);
    }

    public function getCreditCard()
    {
        return (int)$this->getParameter('creditcard');
    }

    public function setCreditCard($value)
    {
        return $this->setParameter('creditcard', $value);
    }

    public function getMkopoRahisi()
    {
        return (int)$this->getParameter('mkoporahisi');
    }

    public function setMkopoRahisi($value)
    {
        return $this->setParameter('mkoporahisi', $value);
    }

    public function getSaida()
    {
        return (int)$this->getParameter('saida');
    }

    public function setSaida($value)
    {
        return $this->setParameter('saida', $value);
    }
    
    public function getData()
    {
        $base = parent::getData();
        
        $methods = array
        (
            'mpesa' => $this->getMpesa(),
            'airtel' => $this->getAirtel(),
            'mobilebanking' => $this->getMobileBanking(),
            'debitcard' => $this->getDebitCard(),
            'creditcard' => $this->getCreditCard(),
            'mkoporahisi' => $this->getMkopoRahisi(),
            'saida' => $this->getSaida(),
        );
        $complete = array_merge($base, $methods);
        return $complete;
    }
}
