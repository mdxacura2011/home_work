<?php
namespace Training\Test\Plugin\Controller\Product;

class View
{
    private $logger;

    public function __construct(
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->logger = $logger;
    }

    public function afterExecute(\Magento\Catalog\Controller\Product\View $subject, $result)
    {

       $this->logger->debug($result->getLayout()->generateXml()->getXmlString());
        return $result;
    }
}