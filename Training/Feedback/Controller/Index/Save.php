<?php
namespace Training\Feedback\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Framework\App\Action\Action
{
    private $feedbackFactory;
    private $feedbackResource;

    public function __construct(
        Context $context,
        \Training\Feedback\Model\FeedbackFactory $feedbackFactory,
        \Training\Feedback\Model\ResourceModel\Feedback $feedbackResource
    )
    {
        $this->feedbackFactory = $feedbackFactory;
        $this->feedbackResource = $feedbackResource;
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->resultRedirectFactory->create();
        if ($post = $this->getRequest()->getPostValue()) {
            try {
                $this->validatePost($post);
                $fedback = $this->feedbackFactory->create();
                $fedback->setData($post);
                $this->feedbackResource->save($fedback);
                $this->messageManager->addSuccessMessage(__('Thank you for your feedback'));
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__('An error occurred while processing your form. Please try again later.'));
                $result->setPath('*/*/form');
                return $result;
            }
        }
        $result->setPath('*/*/index');
        return $result;
    }

    private function validatePost($post)
    {
        if (!isset($post['author_name']) || trim($post['author_name']) === '') {
            throw new LocalizedException(__('Nmae is missing'));
        }

        if (!isset($post['message']) || trim($post['message']) === '') {
            throw new LocalizedException(__('Comment is missing'));
        }

        if (!isset($post['author_email']) || false === strpos($post['author_email'], '@')) {
            throw new LocalizedException(__('Comment is missing'));
        }

        if (trim($this->getRequest()->getParam('hideit')) !== '') {
            throw new \Exception();
        }
    }
}