<?php

namespace SwedbankPaymentPortal\Options;

use SwedbankPaymentPortal\Transaction\TransactionRepositoryFactory;
use SwedbankPaymentPortal\Logger\LoggerInterface;
use SwedbankPaymentPortal\Logger\NullLogger;
use SwedbankPaymentPortal\SharedEntity\Authentication;
use SwedbankPaymentPortal\Transaction\TransactionRepositoryFactoryInterface;

/**
 * Class ServiceOptions.
 */
class ServiceOptions
{
    /**
     * @var TransactionRepositoryFactoryInterface
     */
    private $transactionRepositoryFactory;

    /**
     * @var CommunicationOptions
     */
    private $communicationOptions;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var Authentication
     */
    private $authentication;

    /**
     * Time interval in minutes when to query pending transaction
     * @var int
     */
    private $pendingTransactionQueryingInterval;

    /**
     * ServiceOptions constructor.
     *
     * @param CommunicationOptions                  $communicationOptions
     * @param Authentication                        $authentication
     * @param LoggerInterface                       $logger
     * @param int                                   $pendingTransactionQueryingInterval
     * @param TransactionRepositoryFactoryInterface $transactionRepositoryFactory
     */
    public function __construct(
        CommunicationOptions $communicationOptions,
        Authentication $authentication,
        LoggerInterface $logger = null,
        $pendingTransactionQueryingInterval = null,
        TransactionRepositoryFactoryInterface $transactionRepositoryFactory = null
    ) {
        $this->communicationOptions = $communicationOptions;
        $this->authentication       = $authentication;
        $this->logger               = !$logger ? new NullLogger() : $logger;
        $this->pendingTransactionQueryingInterval = $pendingTransactionQueryingInterval !== null ? $pendingTransactionQueryingInterval : 20;
        $this->transactionRepositoryFactory = !$transactionRepositoryFactory ? new TransactionRepositoryFactory() : $transactionRepositoryFactory;
    }

    /**
     * Cache getter.
     *
     * @return TransactionRepositoryFactoryInterface
     */
    public function getTransactionRepositoryFactory()
    {
        return $this->transactionRepositoryFactory;
    }

    /**
     * @param TransactionRepositoryFactoryInterface $transactionRepositoryFactory
     */
    public function setTransactionRepositoryFactory($transactionRepositoryFactory)
    {
        $this->transactionRepositoryFactory = $transactionRepositoryFactory;
    }

    /**
     * CommunicationOptions getter.
     *
     * @return CommunicationOptions
     */
    public function getCommunicationOptions()
    {
        return $this->communicationOptions;
    }

    /**
     * CommunicationOptions setter.
     *
     * @param CommunicationOptions $communicationOptions
     */
    public function setCommunicationOptions($communicationOptions)
    {
        $this->communicationOptions = $communicationOptions;
    }

    /**
     * Logger getter.
     *
     * @return LoggerInterface
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * Logger setter.
     *
     * @param LoggerInterface $logger
     */
    public function setLogger($logger)
    {
        $this->logger = $logger;
    }

    /**
     * Authentication getter.
     *
     * @return Authentication
     */
    public function getAuthentication()
    {
        return $this->authentication;
    }

    /**
     * Authentication setter.
     *
     * @param Authentication $authentication
     */
    public function setAuthentication($authentication)
    {
        $this->authentication = $authentication;
    }

    /**
     * @return int
     */
    public function getPendingTransactionQueryingInterval()
    {
        return $this->pendingTransactionQueryingInterval;
    }

    /**
     * @param int $pendingTransactionQueryingInterval
     */
    public function setPendingTransactionQueryingInterval($pendingTransactionQueryingInterval)
    {
        $this->pendingTransactionQueryingInterval = $pendingTransactionQueryingInterval;
    }
}
