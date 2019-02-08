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
     * @return \Omnipay\iPayAfrica\Message\PurchaseRequestTanzania
     */
    public function purchaseTanzania(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\iPayAfrica\Message\PurchaseRequestTanzania', $parameters);
    }

    /**
     * @param array $parameters
     * @return \Omnipay\iPayAfrica\Message\PurchaseRequestKenya
     */
    public function purchaseKenya(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\iPayAfrica\Message\PurchaseRequestKenya', $parameters);
    }

    /**
     * @param array $parameters
     * @return \Omnipay\iPayAfrica\Message\CompletePurchaseRequestTanzania
     */
    public function completePurchaseTanzania(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\iPayAfrica\Message\CompletePurchaseRequestTanzania', $parameters);
    }

    /**
     * @param array $parameters
     * @return \Omnipay\iPayAfrica\Message\CompletePurchaseRequestKenya
     */
    public function completePurchaseKenya(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\iPayAfrica\Message\CompletePurchaseRequestKenya', $parameters);
    }

}
