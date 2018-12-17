<?php
namespace Omnipay\iPayAfrica\Message;

use Omnipay\Common\Message\AbstractResponse;

class StatusCallback extends AbstractResponse
{
    
    const STATUS_SUCCESSFUL = 'aei7p7yrx4ae34';
    const STATUS_PENDING = 'bdi6p2yy76etrs';
    const STATUS_FAILED = 'fe2707etr5s4wq';
    const STATUS_USED = 'cr5i3pgy9867e1';
    const STATUS_LESS = 'dtfi4p7yty45wq';
    const STATUS_MORE = 'eq3i7p5yt7645e';

    /**
     * Construct a StatusCallback with the respective POST data.
     *
     * @param array $post post data
     */
    public function __construct(array $post)
    {
        
        $this->hash = $post['sha512'];
    }

    public function isSuccessful()
    {
        return  ($this->getStatus() == self::STATUS_SUCCESSFUL);
    }

    public function isPending()
    {
        return  ($this->getStatus() == self::STATUS_PENDING);
    }

    public function getStatus()
    {
        return mb_strtolower($this->order['status']);
    }
    
    public function getMessage()
    {
        return $this->order['description'].$this->order['decline_reason'];
    }

    public function getCardMask()
    {
        return $this->order['card_num'];
    }

    public function getCardHolder()
    {
        return $this->order['card_holder'];
    }

    public function IdFilled(){
        return ($this->order['id'] != '' ? true : false);
    }

    public function ValidSignature($password){
        $valid = $concat == mb_strtolower($this->hash);
        return $valid;
    }

}
