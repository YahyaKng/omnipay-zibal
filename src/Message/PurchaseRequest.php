<?php

/**
 * @package Omnipay\Zibal
 * @author Yahya Kangi <yhy.kng@gmail.com>
 */

namespace Omnipay\Zibal\Message;

use Omnipay\Common\Exception\InvalidRequestException;

/**
 * Class PurchaseRequest
 */
class PurchaseRequest extends AbstractRequest
{
    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @return mixed
     * @throws InvalidRequestException
     */
    public function getData()
    {
        // Validate required parameters before return data
        $this->validate('merchant', 'amount', 'callbackUrl');

        return [
            'merchant' => $this->getMerchant(),
            'amount' => $this->getAmount(),
            'callbackUrl' => $this->getCallbackUrl(),
            'mobile' => $this->getMobile(),
            'description' => $this->getDescription(),
        ];
    }

    /**
     * @param string $endpoint
     * @return string
     */
    protected function createUri(string $endpoint)
    {
        return $endpoint . '/v1/request/';
    }

    /**
     * @param array $data
     * @return PurchaseResponse
     */
    protected function createResponse(array $data)
    {
        return new PurchaseResponse($this, $data);
    }
}
