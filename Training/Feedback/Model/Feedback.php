<?php
namespace Training\Feedback\Model;

class Feedback extends \Magento\Framework\Model\AbstractExtensibleModel implements \Training\Feedback\Api\Data\FeedbackInterface
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    protected $_eventPrefix = 'training_feedback';
    protected $_eventObject = 'feedback';

    protected function _construct()
    {
        $this->_init(\Training\Feedback\Model\ResourceModel\Feedback::class);
    }

    public function getId()
    {
        return $this->getData(self::FEEDBACK_ID);
    }

    public function getAuthorName()
    {
        return (string)$this->getData(self::AUTHOR_NAME);
    }

    public function getAuthorEmail()
    {
        return $this->getData(self::AUTHOR_EMAIL);
    }

    public function getMessage()
    {
        return $this->getData(self::MESSAGE);
    }

    public function getCreationTime()
    {
        return $this->getData(self::CREATION_TIME);
    }

    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    public function isActive()
    {
        return (bool)$this->getData(self::IS_ACTIVE);
    }

    public function setId($id)
    {
        return $this->setData(self::FEEDBACK_ID, $id);
    }

    public function setAuthorName($authorName)
    {
        return $this->setData(self::AUTHOR_NAME, $authorName);
    }

    public function setAuthorEmail($authorEmail)
    {
        return $this->setData(self::AUTHOR_EMAIL, $authorEmail);
    }

    public function  setMessage($message)
    {
        return $this->setData(self::MESSAGE, $message);
    }

    public function setCreationTime($creationTime)
    {
        return $this->setData(self::CREATION_TIME, $creationTime);
    }

    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }

    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    public function setExtensionAttributes(\Training\Feedback\Api\Data\FeedbackExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}