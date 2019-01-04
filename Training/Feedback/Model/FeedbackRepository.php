<?php
namespace Training\Feedback\Model;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Training\Feedback\Api\FeedbackRepositoryInterface;
use Training\Feedback\Model\ResourceModel\Feedback as FeedbackResource;
use Training\Feedback\Api\Data\FeedbackInterfaceFactory as FeedbackFactory;
use Training\Feedback\Model\ResourceModel\Feedback\CollectionFactory as FeedbackCollectionFactory;
use Training\Feedback\Api\Data\FeedbackSearchResultsInterfaceFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;

class FeedbackRepository implements FeedbackRepositoryInterface
{
    private $resource;
    private $feedbackFactory;
    private $feedbackCollectionFactory;
    private $searchResultFactory;
    private $collectionProcessor;

    public function __construct(
        FeedbackResource $resource,
        FeedbackFactory $feedbackFactory,
        FeedbackCollectionFactory $feedbackCollectionFactory,
        FeedbackSearchResultsInterfaceFactory $searchResultFactory,
        CollectionProcessorInterface $collectionProcessor
    )
    {
        $this->resource = $resource;
        $this->feedbackFactory = $feedbackFactory;
        $this->feedbackCollectionFactory = $feedbackCollectionFactory;
        $this->searchResultFactory = $searchResultFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    public function save(\Training\Feedback\Api\Data\FeedbackInterface $feedback)
    {
        try {
            $this->resource->save($feedback);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the feedback: %1', $exception->getMessage()),
                $exception
            );
        }
        return $feedback;
    }

    public function load(\Training\Feedback\Api\Data\FeedbackInterface $feedback, $value)
    {
        try {
            $this->resource->load($feedback, $value);
        } catch (\Exception $exception) {
            throw new NoSuchEntityException(
                __('Could not load the feedback: %1', $exception->getMessage()),
                $exception
            );
        }
        return $feedback;
    }

    public function getById($feedbackId)
    {
        $feedback = $this->feedbackFactory->create();
        $this->resource->load($feedback, $feedbackId);
        if (!$feedback->getId()) {
            throw new NoSuchEntityException(__('Feedback with id "%1" does not exist.', $feedbackId));
        }
        return $feedback;
    }

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->feedbackCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->searchResultFactory->create();
        $searchResults->getSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    public function delete(\Training\Feedback\Api\Data\FeedbackInterface $feedback)
    {
        try {
            $this->resource->delete($feedback);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the faadback: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    public function deleteById($feedbackId)
    {
        return $this->delete($this->getById($feedbackId));
    }
}