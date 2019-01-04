<?php
namespace Training\Feedback\Api;

interface FeedbackRepositoryInterface
{
    public function save(\Training\Feedback\Api\Data\FeedbackInterface $feedback);

    public function load(\Training\Feedback\Api\Data\FeedbackInterface $feedback, $value);

    public function getById($feedbackId);

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    public function delete(\Training\Feedback\Api\Data\FeedbackInterface $feedback);

    public function deleteById($feedbackId);
}