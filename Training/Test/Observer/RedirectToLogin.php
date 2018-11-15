<?php
namespace Training\Test\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class RedirectToLogin implements ObserverInterface
{
    private $_redirect;
    private $_actionFlag;

    public function __construct(
        \Magento\Framework\App\Response\RedirectInterface $redirect,
        \Magento\Framework\App\ActionFlag $actionFlag
    )
    {
        $this->_redirect = $redirect;
        $this->_actionFlag = $actionFlag;
    }

    public function execute(Observer $observer)
    {
        $request = $observer->getEvent()->getData('request');

        if ($request->getModuleName() == 'catalog'
            && $request->getControllerName() == 'product'
            && $request->getActionName() == 'view'
        ) {
            $controller​ = $observer->getEvent()->getData('controller_action');
            $this->_actionFlag->set('', \Magento\Framework\App\Action\AbstractAction::FLAG_NO_DISPATCH, true);
            $this->_redirect->redirect($controller​->getResponse(), 'customer/account/login');
        }
    }
}