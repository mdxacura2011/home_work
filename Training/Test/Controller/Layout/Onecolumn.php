<?php
namespace Training\Test\Controller\Layout;

use Magento\Framework\App\Action\Context;

class Onecolumn extends \Magento\Framework\App\Action\Action
{
    protected $pageResultFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\View\Result\PageFactory $pageResultFactory
    )
    {
        $this->pageResultFactory = $pageResultFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->pageResultFactory->create();
        return $result;
    }
}