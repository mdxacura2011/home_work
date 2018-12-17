<?php
namespace Training\Feedback\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class FeedbackForm implements ArgumentInterface
{
    private $urlBuilder;
    public function __construct(
        \Magento\Framework\UrlInterface $urlBuilder
    )
    {
        $this->urlBuilder = $urlBuilder;
    }
    public function getActionUrl()
    {
        return $rrr = $this->urlBuilder->getUrl('feedback/index/save');
    }
}