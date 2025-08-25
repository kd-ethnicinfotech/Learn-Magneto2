<?php

namespace Show\Result\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use Show\Result\Api\Data\ViewInterface;


class Custom extends AbstractModel implements ViewInterface
{
    const CACHE_TAG = 'show_result_view';

    protected function _construct()
    {
        $this->_init(\Show\Result\Model\ResourceModel\Custom::class);
    }

    /**
     * Getters 
     **/
    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function getName()
    {
        return $this->getData(self::NAME);
    }

    public function getAddress()
    {
        return $this->getData(self::ADDRESS);
    }

    public function getNumber()
    {
        return $this->getData(self::NUMBER);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Setters 
     **/
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    public function setAddress($address)
    {
        return $this->setData(self::ADDRESS, $address);
    }

    public function setNumber($number)
    {
        return $this->setData(self::NUMBER, $number);
    }

    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Identity Interface 
     **/
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
