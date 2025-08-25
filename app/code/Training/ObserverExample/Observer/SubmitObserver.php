<?php
namespace Training\ObserverExample\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Psr\Log\LoggerInterface;

class SubmitObserver implements ObserverInterface
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();

        $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/PickupPoints.log');
        $logger = new \Zend_Log();
        $logger->addWriter($writer);
        $logger->info('My Observer called'.$order->getId());
    }
}
