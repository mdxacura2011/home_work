<?php
namespace Training\Test\Controller\Block;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\RawFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    private $layoutFactory;
    private $resultRawfactory;

    public function __construct(
        Context $context,
        \Magento\Framework\View\LayoutFactory $layoutFactory,
        RawFactory $resultRawfactory
    )
    {
        $this->layoutFactory = $layoutFactory;
        $this->resultRawfactory = $resultRawfactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $layout = $this->layoutFactory->create();
        $resultRaw = $this->resultRawfactory->create();
        $block = $layout->createBlock('Training\Test\Block\Test');
        //$this->getResponse()->appendBody($block->toHtml());
        return $resultRaw->setContents($block->toHtml());
    }
}