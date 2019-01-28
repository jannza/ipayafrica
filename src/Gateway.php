<?php

namespace Omnipay\iPayAfrica;

use Omnipay\Common\AbstractGateway;

/**
 * iPayAfrica Gateway
 *
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'iPayAfrica';
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
    

    /**
     * @param array $parameters
     * @return \Omnipay\iPayAfrica\Message\PurchaseRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\iPayAfrica\Message\PurchaseRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return \Omnipay\iPayAfrica\Message\PurchaseRequest
     */
    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\iPayAfrica\Message\CompletePurchaseRequest', $parameters);
    }

}
