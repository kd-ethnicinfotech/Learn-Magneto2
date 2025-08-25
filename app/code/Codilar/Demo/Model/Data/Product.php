<?php
namespace Codilar\Demo\Model\Data;

use Codilar\Demo\Api\Data\ProductInterface;
use Magento\Framework\DataObject;

class Product extends DataObject implements ProductInterface
{
    // for id    
    public function getId()
    {
        return $this->getData('id');
    }
    public function setId($id)
    {
        return $this->setData('id', $id);    
    }
    // for sku
    public function getSku()
    {
        return $this->getData('sku');
    }
    public function setSku($sku)
    {
        return $this->setData('sku', $sku);    
    }
    // for name
    public function getName()
    {
        return $this->getData('name');
    }
    public function setName($name)
    {
        return $this->setData('name', $name);    
    }
    // for pricing
    public function getPrice()
    {
        return $this->getData('price');
    }
    public function setPrice($price)
    {
        return $this->setData('price', $price);    
    }
    // for image
    public function getImage()
    {
        return $this->getData('image');
    }
    public function setImage($image)
    {
        return $this->setData('image', $image);    
    }

}
