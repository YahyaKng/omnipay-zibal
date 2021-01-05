<?php

/**
 * @package Omnipay\Zibal
 * @author Yahya Kangi <yhy.kng@gmail.com>
 */

namespace Omnipay\Zibal;

use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\Zibal\Message\PurchaseCompleteRequest;
use Omnipay\Zibal\Message\PurchaseRequest;

/**
 * Class Gateway
 */
class Gateway extends AbstractGateway
{
    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     * @return string
     */
    public function getName()
    {
        return 'Zibal';
    }

    /**
     * @return array
     */
    public function getDefaultParameters()
    {
        return [
            'merchant' => '',
            'callbackUrl' => '',
            'amount' => '',
            'description' => '',
            'mobile' => ''
        ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setMerchant(string $value)
    {
        return $this->setParameter('merchant', $value);
    }

    /**
     * @return string
     */
    public function getMerchant()
    {
        return $this->getParameter('merchant');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setCallbackUrl(string $value)
    {
        return $this->setParameter('callbackUrl', $value);
    }

    /**
     * @return string
     */
    public function getCallbackUrl()
    {
        return $this->getParameter('callbackUrl');
    }

    /**
     * @return string
     */
    public function getTrackId()
    {
        return $this->getParameter('trackId');
    }

    /**
    * @return string
    */
   public function setTrackId(string $value)
   {
       return $this->setParameter('trackId', $value);
   }

    /**
     * @return string
     */
    public function setAmount(string $value)
    {
        return $this->setParameter('amount', $value);
    }

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->getParameter('amount');
    }

    /**
     * @return string
     */
    public function setDescription(string $value)
    {
        return $this->setParameter('description', $value);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getParameter('description');
    }

    /**
     * @return string
     */
    public function setMobile(string $value)
    {
        return $this->setParameter('mobile', $value);
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->getParameter('mobile');
    }

    /**
     * @param array $parameters
     * @return AbstractRequest|RequestInterface
     */
    public function purchase(array $parameters = [])
    {
        return $this->createRequest(PurchaseRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     * @return AbstractRequest|RequestInterface
     */
    public function completePurchase(array $parameters = [])
    {
        return $this->createRequest(PurchaseCompleteRequest::class, $parameters);
    }
}
