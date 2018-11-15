<?php
namespace Training\Test\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\RawFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    private $_resultRawfactory;

    public function __construct(
        Context $context,
        RawFactory $resultRawfactory
    )
    {
        $this->_resultRawfactory = $resultRawfactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRaw = $this->_resultRawfactory->create();
        //return $resultRaw->setContents('simple text');
    }
}