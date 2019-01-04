<?php
namespace Training\Feedback\Api\Data;

use Magento\Framework\Data\SearchResultInterface;

interface FeedbackSearchResultsInterface extends SearchResultInterface
{
    public function getItems();

    public function setItems(array $items);
}