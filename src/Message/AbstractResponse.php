<?php

/**
 * @package Omnipay\Zibal
 * @author Yahya Kangi <yhy.kng@gmail.com>
 */

namespace Omnipay\Zibal\Message;

/**
 * Class AbstractResponse
 */
abstract class AbstractResponse extends \Omnipay\Common\Message\AbstractResponse
{
    /**
     * The embodied request object.
     *
     * @var AbstractRequest
     */
    protected $request;

    /**
     * @var array
     */
    private $errorCodes = [
        '100' => 'با موفقیت تایید شد.',
        '102' => 'merchant یافت نشد.',
        '103' => 'merchant غیرفعال',
        '104' => 'merchant نامعتبر',
        '201' => 'قبلا تایید شده.',
        '105' => 'amount بایستی بزرگتر از 1,000 ریال باشد.',
        '106' => 'callbackUrl نامعتبر می‌باشد. (شروع با http و یا https)',
        '113' => 'amount مبلغ تراکنش از سقف میزان تراکنش بیشتر است.',
        '202' => 'سفارش پرداخت نشده یا ناموفق بوده است. ',
        '203' => 'trackId نامعتبر می‌باشد.'
    ];

    /**
     * Response Message
     *
     * @return null|string A response message from the payment gateway
     */
    public function getMessage()
    {
        return isset($this->errorCodes[$this->getCode()]) ? $this->errorCodes[$this->getCode()] : parent::getMessage();
    }

    /**
     * Response code
     *
     * @return null|string A response code from the payment gateway
     */
    public function getCode()
    {
        return isset($this->data['result']) ? $this->data['result'] : parent::getCode();
    }
}
