<?php

/**
 * @package Omnipay\Zibal
 * @author Yahya Kangi <yhy.kng@gmail.com>
 */

namespace Omnipay\Zibal\Message;

use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Class PurchaseResponse
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    /**
     * Sandbox Endpoint URL
     *
     * @var string URL
     */
    // protected $testEndpoint = 'https://testnet.zibal.market/app/paygate/';

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
        // return false;
        return isset($this->data['result']) && $this->data['result'] == '100' && isset($this->data['trackId']);
    }

    /**
     * Does the response require a redirect?
     *
     * @return boolean
     */
    public function isRedirect()
    {
        return isset($this->data['result']) && $this->data['result'] == '100';
    }

    /**
     * Gets the redirect target url.
     *
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->getEndpoint() . "start/" .$this->data['trackId'];
    }

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return $this->endpoint;
    }
}
