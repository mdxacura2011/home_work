<?php
namespace Training\Js\Controller\Qty;

use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    private $jsonResultFactory;
    private $productStockQty;

    public function __construct(
        Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory,
        \Magento\CatalogInventory\Api\StockStateInterface $productStockQty
    )
    {
        $this->jsonResultFactory = $jsonResultFactory;
        $this->productStockQty = $productStockQty;
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->jsonResultFactory->create();
        if($response = $this->getRequest()->getPost('id_product')) {
            $qty = $this->productStockQty->getStockQty($response);
            $result->setData(json_encode(['qty' => $qty]));
        }

        return $result;
    }

}