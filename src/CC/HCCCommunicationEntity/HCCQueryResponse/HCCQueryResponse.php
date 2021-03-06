<?php

namespace SwedbankPaymentPortal\CC\HCCCommunicationEntity\HCCQueryResponse;

use JMS\Serializer\Annotation as Annotation;
use SwedbankPaymentPortal\CC\Type\ThreeDAuthorizationStatus;
use SwedbankPaymentPortal\SharedEntity\AbstractResponse;
use SwedbankPaymentPortal\SharedEntity\Type\MerchantMode;

/**
 * The container for the XML response.
 *
 * @Annotation\XmlRoot("Response")
 * @Annotation\AccessType("public_method")
 */
class HCCQueryResponse extends AbstractResponse
{
    /**
     * API version used.
     *
     * @var int
     *
     * @Annotation\XmlAttribute
     * @Annotation\Type("integer")
     */
    private $version;

    /**
     * The container for the query hps txn result.
     *
     * @var HpsTxn
     *
     * @Annotation\SerializedName("HpsTxn")
     * @Annotation\Type("SwedbankPaymentPortal\CC\HCCCommunicationEntity\HCCQueryResponse\HpsTxn")
     */
    private $hpsTxn;

    /**
     * The container for the query txn result.
     *
     * @var QueryTxnResult
     *
     * @Annotation\SerializedName("QueryTxnResult")
     * @Annotation\Type("SwedbankPaymentPortal\CC\HCCCommunicationEntity\HCCQueryResponse\QueryTxnResult")
     */
    private $queryTxnResult;

    /**
     * The container for the risk screening.
     *
     * @var Risk
     *
     * @Annotation\SerializedName("Risk")
     * @Annotation\Type("SwedbankPaymentPortal\CC\HCCCommunicationEntity\HCCQueryResponse\Risk")
     */
    private $risk;

    /**
     * Indicates if simulators have been used or a payment provider has been contacted.
     *
     * @var MerchantMode
     *
     * @Annotation\Type("SwedbankPaymentPortal\SharedEntity\Type\MerchantMode")
     */
    private $mode;

    /**
     * Any other return code should be treated as a declined / failed payment.
     *
     * This is the ultimate field that should be used to determine the status of the transaction.
     *
     * @var ThreeDAuthorizationStatus
     *
     * @Annotation\Type("SwedbankPaymentPortal\CC\Type\ThreeDAuthorizationStatus")
     */
    private $status;

    /**
     * HCCQueryResponse constructor.
     *
     * @param int                       $version
     * @param QueryTxnResult            $queryTxnResult
     * @param Risk                      $risk
     * @param MerchantMode              $mode
     * @param string                    $reason
     * @param ThreeDAuthorizationStatus $status
     * @param int                       $time
     */
    public function __construct(
        $version,
        QueryTxnResult $queryTxnResult,
        Risk $risk,
        MerchantMode $mode,
        $reason,
        ThreeDAuthorizationStatus $status,
        $time
    ) {
        parent::__construct($reason, $time);
        $this->version        = $version;
        $this->queryTxnResult = $queryTxnResult;
        $this->risk           = $risk;
        $this->mode           = $mode;
        $this->status         = $status;
    }

    /**
     * Version getter.
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Version setter.
     *
     * @param int $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return HpsTxn
     */
    public function getHpsTxn()
    {
        return $this->hpsTxn;
    }

    /**
     * QueryTxnResult getter.
     *
     * @return QueryTxnResult
     */
    public function getQueryTxnResult()
    {
        return $this->queryTxnResult;
    }

    /**
     * QueryTxnResult setter.
     *
     * @param Risk $queryTxnResult
     */
    public function setQueryTxnResult($queryTxnResult)
    {
        $this->queryTxnResult = $queryTxnResult;
    }

    /**
     * Risk getter.
     *
     * @return Risk
     */
    public function getRisk()
    {
        return $this->risk;
    }

    /**
     * Risk setter.
     *
     * @param Risk $risk
     */
    public function setRisk($risk)
    {
        $this->risk = $risk;
    }

    /**
     * Mode getter.
     *
     * @return MerchantMode
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Mode setter.
     *
     * @param MerchantMode $mode
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
    }

    /**
     * Status getter.
     *
     * @return ThreeDAuthorizationStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param HpsTxn $hpsTxn
     */
    public function setHpsTxn($hpsTxn)
    {
        $this->hpsTxn = $hpsTxn;
    }


    /**
     * Status setter.
     *
     * @param ThreeDAuthorizationStatus $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
