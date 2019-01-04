<?php
namespace Training\FeedbackProduct\Model\ResourceModel\FeedbackProducts;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Training\FeedbackProduct\Model\FeedbackProducts::class,
            \Training\FeedbackProduct\Model\ResourceModel\FeedbackProducts::class
        );
    }
}
