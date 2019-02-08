<?php

namespace Omnipay\iPayAfrica\Message;

use Omnipay\iPayAfrica\Message\Request;

class PurchaseRequestGeneric extends Request
{
        
    public function getLive()
    {
        return (int)!$this->getTestMode();
    }
    
    public function getOid()
    {
        return $this->getParameter('oid');
    }

    public function setOid($value)
    {
        return $this->setParameter('oid', $value);
    }

    public function getInv()
    {
        return $this->getParameter('inv');
    }

    public function setInv($value)
    {
        return $this->setParameter('inv', $value);
    }

    public function getTtl()
    {
        return $this->getParameter('ttl');
    }

    public function setTtl($value)
    {
        return $this->setParameter('ttl', $value);
    }
    
    public function getTel()
    {
        return mb_substr($this->getParameter('tel'), 0, 15);
    }

    public function setTel($value)
    {
        return $this->setParameter('tel', $value);
    }
    
    public function getEml()
    {
        return mb_substr($this->getParameter('eml'), 0, 30);
    }

    public function setEml($value)
    {
        return $this->setParameter('eml', $value);
    }
    
    public function getVid()
    {
        return $this->getParameter('vid');
    }

    public function setVid($value)
    {
        return $this->setParameter('vid', $value);
    }
    
    public function getCurr()
    {
        return $this->getParameter('curr');
    }

    public function setCurr($value)
    {
        return $this->setParameter('curr', $value);
    }
    
    public function getP1()
    {
        return mb_substr($this->getParameter('p1'), 0, 15);
    }

    public function setP1($value)
    {
        return $this->setParameter('p1', $value);
    }
    
    public function getP2()
    {
        return mb_substr($this->getParameter('p2'), 0, 15);
    }

    public function setP2($value)
    {
        return $this->setParameter('p2', $value);
    }
    
    public function getP3()
    {
        return mb_substr($this->getParameter('p3'), 0, 15);
    }

    public function setP3($value)
    {
        return $this->setParameter('p3', $value);
    }
    
    public function getP4()
    {
        return mb_substr($this->getParameter('p4'), 0, 15);
    }

    public function setP4($value)
    {
        return $this->setParameter('p4', $value);
    }
    
    public function getCbk()
    {
        return $this->getParameter('cbk');
    }

    public function setCbk($value)
    {
        return $this->setParameter('cbk', $value);
    }
    
    public function getLbk()
    {
        return $this->getParameter('lbk');
    }

    public function setLbk($value)
    {
        return $this->setParameter('lbk', $value);
    }
    
    public function getCst()
    {
        return (int)$this->getParameter('cst');
    }

    public function setCst($value)
    {
        return $this->setParameter('cst', $value);
    }
    
    public function getCrl()
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
    public function setCrl($value)
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
            'oid' => $this->getOid(),
            'inv' => $this->getInv(),
            'ttl' => $this->getTtl(),
            'tel' => $this->getTel(),
            'eml' => $this->getEml(),
            'vid' => $this->getUsername(),
            'curr' => $this->getCurr(),
            'p1' => $this->getP1(),
            'p2' => $this->getP2(),
            'p3' => $this->getP3(),
            'p4' => $this->getP4(),
            'cbk' => $this->getCbk(),
            'lbk' => $this->getLbk(),
            'cst' => $this->getCst(),
            'crl' => $this->getCrl(),
            'hsh' => $this->createChecksum(),
        );
        
        return $data;
    }
    
    public function createChecksum()
    {
        $concat = $this->getLive().$this->getOid().$this->getInv().$this->getTtl().$this->getTel().$this->getEml();
        $concat .= $this->getUsername().$this->getCurr().$this->getP1().$this->getP2().$this->getP3().$this->getP4();
        $concat .= $this->getCbk().$this->getCst().$this->getCrl();
        
        $hash = hash_hmac("sha1", $concat, $this->getPassword());

        return $hash;
    }
    
    public function sendData($data)
    {
        return new PurchaseResponse($this, $data, $this->getEndpoint());
    }

}
