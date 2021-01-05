<?php

/**
 * @package Omnipay\Zibal
 * @author Yahya Kangi <yhy.kng@gmail.com>
 */

namespace Omnipay\Zibal\Message;

use Omnipay\Common\Exception\InvalidRequestException;

/**
 * Class PurchaseCompleteRequest
 */
class PurchaseCompleteRequest extends AbstractRequest
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
        $this->validate('merchant', 'trackId');

        return [
            'merchant' => $this->getMerchant(),
            'trackId' => $this->getTrackId(),
        ];
    }

    /**
     * @param string $endpoint
     * @return string
     */
    protected function createUri(string $endpoint)
    {
        return $endpoint . '/v1/verify/';
    }

    /**
     * @param array $data
     * @return PurchaseCompleteResponse
     */
    protected function createResponse(array $data)
    {
        return new PurchaseCompleteResponse($this, $data);
    }
}
