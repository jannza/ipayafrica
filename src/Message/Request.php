<?php

namespace Omnipay\iPayAfrica\Message;

use Omnipay\Common\Message\AbstractRequest;

abstract class Request extends AbstractRequest
{

    public function getEndpoint()
    {
        return $this->endpoint;
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
