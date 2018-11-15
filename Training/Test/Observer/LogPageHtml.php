<?php
namespace Training\Test\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class LogPageHtml implements ObserverInterface
{
    private $_logger;

    public function __construct(
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->_logger = $logger;
    }

    public function execute(Observer $observer)
    {
       $response = $observer->getEvent()->getData('response');
       $this->_logger->debug($response->getBody());
    }
}