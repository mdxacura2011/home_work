<?php
namespace Training\Render\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class Form implements ArgumentInterface
{
    private $urlBuilder;

    public function __construct(
        \Magento\Framework\UrlInterface $urlBuilder
    )
    {
        $this->urlBuilder = $urlBuilder;
    }

    public function getSubmitUrl()
    {
        return $this->urlBuilder->getUrl('custom/account/login');
    }
}