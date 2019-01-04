<?php
namespace Training\FeedbackProduct\Model;

use Magento\Framework\Model\Context;
use \Magento\Framework\Model\ResourceModel\AbstractResource;

class FeedbackProducts extends \Magento\Framework\Model\AbstractModel
{
    private $feedbackDataloader;
    private $feedbackProductsResource;

    protected function _construct()
    {
        $this->_init(\Training\FeedbackProduct\Model\ResourceModel\FeedbackProducts::class);
    }

    public function __construct(
        Context $context,
        \Magento\Framework\Registry $registry,
        AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        \Training\FeedbackProduct\Model\FeedbackDataLoader $feedbackDataLoader,
        \Training\FeedbackProduct\Model\ResourceModel\FeedbackProducts $feedbackProductsResource,
        array $data = []
    )
    {
        $this->feedbackDataloader = $feedbackDataLoader;
        $this->feedbackProductsResource = $feedbackProductsResource;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    public function loadProductRelations($feedback)
    {
        $productIds = $this->feedbackProductsResource->loadProductRelations($feedback->getId);
        return $this->feedbackDataloader->addProductsToFeedbackByIds($feedback, $productIds);
    }

    public function saveProductRelations($feedback)
    {
        $productIds = [];
        $products = $feedback->getExtensionAttributes()->getProducts();
        foreach ($products as $product) {
            $productIds = $product->getId();
        }

        $this->feedbackProductsResource->saveProductRelations($feedback->getId(), $productIds);
        return $this;
    }
}