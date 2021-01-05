<?php

/**
 * @package Omnipay\Zibal
 * @author Yahya Kangi <yhy.kng@gmail.com>
 */

namespace Omnipay\Zibal\Message;

/**
 * Class PurchaseCompleteResponse
 */
class PurchaseCompleteResponse extends AbstractResponse
{
    /**
     * Live Endpoint URL
     *
     * @var string URL
     */
    protected $endpoint = 'https://gateway.zibal.ir/';

    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return isset($this->data['result']) && $this->data['result'] == '100';
    }

    /**
     * Gateway Reference
     *
     * @return null|string A reference provided by the gateway to represent this transaction
     */
    public function getTransactionReference()
    {
        return $this->data['refNumber'];
    }

    /**
     * Gateway Reference
     *
     * @return null|string A reference provided by the gateway to represent this transaction
     */
    public function getMessage()
    {
        return $this->data['message'];
    }

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return $this->endpoint;
    }
}
