<?php
namespace Training\Test\Plugin\Block\Product\View;

class Attributes
{
    private $logger;

    public function __construct(
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->logger = $logger;
    }

    public function afterToHtml(\Magento\Catalog\Block\Product\View\Attributes $subject, $result)
    {
        $this->logger->debug($subject->getTemplate());
    }
}