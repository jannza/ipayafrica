<?php

namespace Omnipay\iPayAfrica\Message;

use Omnipay\Common\Message\AbstractRequest;

class PaymentRequest extends AbstractRequest
{
    protected $endpoints = array
    (
        'ELIPA' => 'https://payments.elipa.co.tz/v3/tz',
        'IPAY' => 'https://payments.ipayafrica.com/v3/ke',
    );
    

    public function getEndpoint()
    {
        return $endpoints[$this->getProvider()];
    }
    
    public function getProvider()
    {
        return $this->getParameter('provider');
    }

    public function setProvider($value)
    {
        $refl = new ReflectionClass('PaymentMethod');
        $methods = array_keys($refl);
        $result = false;
        if(array_key_exists($value, $methods)){
            $result = $this->setParameter('provider', $value)
        }else{
            $result = $this->setParameter('provider', null);
        }

        return $result;
    }

	public function getUsername()
    {
        return $this->getParameter('username');
    }

    public function setUsername($value)
    {
        return $this->setParameter('username', $value);
    }

    public function getPassword()
    {
        return $this->getParameter('password');
    }

    public function setPassword($value)
    {
        return $this->setParameter('password', $value);
    }

    public function getLive()
    {
        return (int)!$this->getTestMode();
    }

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
    
    public function getOrderId()
    {
        return $this->getParameter('oid');
    }

    public function setOrderId($value)
    {
        return $this->setParameter('oid', $value);
    }

    public function getInvoiceNumber()
    {
        return $this->getParameter('inv');
    }

    public function setInvoiceNumber($value)
    {
        return $this->setParameter('inv', $value);
    }

    public function getAmount()
    {
        return $this->getParameter('ttl');
    }

    public function setAmount($value)
    {
        return $this->setParameter('ttl', $value);
    }
    
    public function getPhone()
    {
        return $this->getParameter('tel');
    }

    public function setPhone($value)
    {
        return $this->setParameter('tel', $value);
    }
    
    public function getEmail()
    {
        return $this->getParameter('eml');
    }

    public function setEmail($value)
    {
        return $this->setParameter('eml', $value);
    }
    
    public function getVendorId()
    {
        return $this->getParameter('vid');
    }

    public function setVendorId($value)
    {
        return $this->setParameter('vid', $value);
    }
    
    public function getCurrency()
    {
        return $this->getParameter('curr');
    }

    public function setCurrency($value)
    {
        return $this->setParameter('curr', $value);
    }
    
    public function getOptional1()
    {
        return $this->getParameter('p1');
    }

    public function setOptional1($value)
    {
        return $this->setParameter('p1', $value);
    }
    
    public function getOptional2()
    {
        return $this->getParameter('p2');
    }

    public function setOptional2($value)
    {
        return $this->setParameter('p2', $value);
    }
    
    public function getOptional3()
    {
        return $this->getParameter('p3');
    }

    public function setOptional3($value)
    {
        return $this->setParameter('p3', $value);
    }
    
    public function getOptional4()
    {
        return $this->getParameter('p4');
    }

    public function setOptional4($value)
    {
        return $this->setParameter('p4', $value);
    }
    
    public function getNotifyUrl()
    {
        return $this->getParameter('cbk');
    }

    public function setNotifyUrl($value)
    {
        return $this->setParameter('cbk', $value);
    }
    
    public function getDeclineUrl()
    {
        return $this->getParameter('lbk');
    }

    public function setDeclineUrl($value)
    {
        return $this->setParameter('lbk', $value);
    }
    
    public function getNotifyClient()
    {
        return (int)$this->getParameter('cst');
    }

    public function setNotifyClient($value)
    {
        return $this->setParameter('cst', $value);
    }
    
    public function getCallbackType()
    {
        return $this->getParameter('crl');
    }

    /**
     * Set the type of callback made
     *
     * Default value is 0.
     *
     * * 0 = http/https callback
     * * 1 = data stream of comma separated values
     * * 2 = json data stream
     *
     * @param int $value callback type
     */
    public function setCallbackType($value)
    {
        $supported = array(0, 1, 2);
        
        if(!in_array($value, $supported)){
            $value = 0;
        }
        return $this->setParameter('crl', $value);
    }
    
    public function getData()
    {
        $data = array
        (
            'live' => $this->getLive(),
            'mpesa' => $this->getMpesa(),
            'airtel' => $this->getAirtel(),
            'mobilebanking' => $this->getMobileBanking(),
            'debitcard' => $this->getDebitCard(),
            'creditcard' => $this->getCreditCard(),
            'mkoporahisi' => $this->getMkopoRahisi(),
            'saida' => $this->getSaida(),
            'oid' => $this->getOrderId(),
            'inv' => $this->getInvoiceNumber(),
            'ttl' => $this->getAmount(),
            'tel' => $this->getPhone(),
            'eml' => $this->getEmail(),
            'vid' => $this->getVendorId(),
            'curr' => $this->getCurrency(),
            'p1' => $this->getOptional1(),
            'p2' => $this->getOptional2(),
            'p3' => $this->getOptional3(),
            'p4' => $this->getOptional4(),
            'cbk' => $this->getNotifyUrl(),
            'lbk' => $this->getDeclineUrl(),
            'cst' => $this->getNotifyClient(),
            'crl' => $this->getCallbackType(),
            'hsh' => $this->createChecksum(),
        );

        return $data;
    }
    
    public function createChecksum()
    {
        $concat = $this->getLive().$this->getOrderId().$this->getInvoiceNumber().$this->getAmount().$this->getPhone().$this->getEmail();
        $concat .= $this->getVendorId().$this->getCurrency().$this->getOptional1().$this->getOptional2().$this->getOptional3().$this->getOptional4();
        $concat .= $this->getNotifyUrl().$this->getNotifyClient().$this->getCallbackType();
        
        $hash = hash_hmac("sha1", $concat, $this->getPassword());

        return $hash;
    }
    
    public function sendData($data)
    {
        return new PaymentResponse($this, $data, $this->getEndpoint());
    }

}
