<?php
namespace Training\FeedbackProduct\Model\ResourceModel;

class FeedbackProducts extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    protected function _construct()
    {
        $this->_init('training_feedback_product', 'row_id');
    }

    public function loadProductRelations($id) {
        $adapter = $this->getConnection();
        $select = $adapter->select('product_id')->from('training_feedback_product')->where('id=?', $id);
        return $adapter->fetchOne($select);
    }

    public function saveProductRelations($feedbackId, $productIds) {
        $adapter = $this->getConnection();
        $adapter->insert('training_feedback_product', [$feedbackId, $productIds]);
    }
}