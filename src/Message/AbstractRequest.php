<?php

/**
 * @package Omnipay\Zibal
 * @author Yahya Kangi <yhy.kng@gmail.com>
 */

namespace Omnipay\Zibal\Message;

use Exception;
use Omnipay\Common\Exception\InvalidResponseException;
use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\ResponseInterface;

/**
 * Class AbstractRequest
 */
abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{

    /**
     * Endpoint URL
     *
     * @var string URL
     */
    protected $endpoint = 'https://gateway.zibal.ir';

    /**
     * @return string
     */
    public function getMerchant()
    {
        return $this->getParameter('merchant');
    }

    /**
     * @param string $value
     * @return AbstractRequest
     */
    public function setMerchant(string $value)
    {
        return $this->setParameter('merchant', $value);
    }

    /**
     * @param string $value
     * @return AbstractRequest
     */
    public function setCallbackUrl(string $value)
    {
        return $this->setParameter('callbackUrl', $value);
    }

    /**
     * Get the gateway invoice token.
     *
     * @return string
     */
    public function getTrackId()
    {
        $value = $this->getParameter('trackId');
        $value = $value ?: $this->httpRequest->query->get('trackId');
        return $value;
    }

    /**
     * @param string $value
     * @return AbstractRequest
     */
    public function setTrackId(string $value)
    {
        return $this->setParameter('trackId', $value);
    }

    /**
     * Get the gateway invoice token.
     *
     * @return string
     */
    public function getOrderId()
    {
        $value = $this->getParameter('orderId');
        $value = $value ?: $this->httpRequest->query->get('orderId');
        return $value;
    }

    /**
     * @param string $value
     * @return AbstractRequest
     */
    public function setOrderId(string $value)
    {
        return $this->setParameter('orderId', $value);
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
    public function getDescription()
    {
        return $this->getParameter('description');
    }

    /**
     * Send the request with specified data
     *
     * @param mixed $data The data to send.
     * @return ResponseInterface
     * @throws InvalidResponseException
     */
    public function sendData($data)
    {
        try {
            $httpResponse = $this->httpClient->request(
                'POST',
                $this->createUri($this->getEndpoint()),
                [
                    'Accept' => 'application/json',
                    'Content-type' => 'application/json',
                ],
                json_encode($data)
            );
            $json = $httpResponse->getBody()->getContents();
            $data = !empty($json) ? json_decode($json, true) : [];
            return $this->response = $this->createResponse($data);
        } catch (Exception $e) {
            throw new InvalidResponseException(
                'Error communicating with payment gateway: ' . $e->getMessage(),
                $e->getCode()
            );
        }
    }

    /**
     * @param string $endpoint
     * @return string
     */
    abstract protected function createUri(string $endpoint);

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @param array $data
     * @return AbstractResponse
     */
    abstract protected function createResponse(array $data);

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->getParameter('mobile');
    }

    /**
     * @return string
     */
    public function getCallbackUrl()
    {
        return $this->getParameter('callbackUrl');
    }
}
