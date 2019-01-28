<?php

namespace Omnipay\iPayAfrica\Message;

use Omnipay\Common\Message\AbstractRequest;
use ReflectionClass;

abstract class Request extends AbstractRequest
{

    const ELIPA                   = 'ELIPA';
    const IPAY                    = 'IPAY';
    

    public function getEndpoint()
    {
        return $this->endpoints[$this->getProvider()];
    }
    
    public function getProvider()
    {
        return $this->getParameter('provider');
    }

    public function setProvider($value)
    {
        $refl = new ReflectionClass($this);
        $methods = $refl->getConstants();
        $result = false;
        if(array_key_exists($value, $methods)){
            $result = $this->setParameter('provider', $value);
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
}
