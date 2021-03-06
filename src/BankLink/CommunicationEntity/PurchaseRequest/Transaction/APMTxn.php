<?php

namespace SwedbankPaymentPortal\BankLink\CommunicationEntity\PurchaseRequest\Transaction;

use SwedbankPaymentPortal\BankLink\CommunicationEntity\PurchaseRequest\Transaction\APMTxn\AlternativePayment;
use SwedbankPaymentPortal\BankLink\CommunicationEntity\Type\PaymentMethod;
use JMS\Serializer\Annotation;

/**
 * The container for the APM transaction.
 *
 * @Annotation\AccessType("public_method")
 */
class APMTxn
{
    /**
     * The transaction type. The value purchase should be sent through in this field.
     *
     * @var string
     *
     * @Annotation\XmlElement(cdata=false)
     * @Annotation\Type("string")
     */
    private $method = 'purchase';

    /**
     * @var PaymentMethod
     *
     * @Annotation\Type("SwedbankPaymentPortal\BankLink\CommunicationEntity\Type\PaymentMethod")
     */
    private $paymentMethod;

    /**
     * @var AlternativePayment
     *
     * @Annotation\SerializedName("AlternativePayment")
     * @Annotation\Type("SwedbankPaymentPortal\BankLink\CommunicationEntity\PurchaseRequest\Transaction\APMTxn\AlternativePayment")
     */
    private $alternativePayment;

    /**
     * APMTxn constructor.
     *
     * @param PaymentMethod      $paymentMethod
     * @param AlternativePayment $alternativePayment
     */
    public function __construct(PaymentMethod $paymentMethod, AlternativePayment $alternativePayment)
    {
        $this->paymentMethod = $paymentMethod;
        $this->alternativePayment = $alternativePayment;
    }

    /**
     * AlternativePayment getter.
     *
     * @return AlternativePayment
     */
    public function getAlternativePayment()
    {
        return $this->alternativePayment;
    }

    /**
     * AlternativePayment setter.
     *
     * @param AlternativePayment $alternativePayment
     */
    public function setAlternativePayment($alternativePayment)
    {
        $this->alternativePayment = $alternativePayment;
    }

    /**
     * PaymentMethod getter.
     *
     * @return PaymentMethod
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * PaymentMethod setter.
     *
     * @param PaymentMethod $paymentMethod
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * Method getter.
     *
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Method setter.
     *
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }
}
