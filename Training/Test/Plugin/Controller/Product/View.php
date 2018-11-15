<?php
namespace Training\Test\Plugin\Controller\Product;

class View
{
    protected $_customerSession;
    protected $_redirectFactory;

    public function __construct(
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Framework\Controller\Result\RedirectFactory $redirectFactory
    )
    {
        $this->_customerSession = $customerSession;
        $this->_redirectFactory = $redirectFactory;
    }

    public function aroundExecute(
        \Magento\Catalog\Controller\Product\View $subject,
        \Closure $proceed
    )
    {
        if (!$this->_customerSession->isLoggedIn()) {
            return $this->_redirectFactory->create()->setPath('customer/account/login');
        }
        return $proceed;
    }
}
