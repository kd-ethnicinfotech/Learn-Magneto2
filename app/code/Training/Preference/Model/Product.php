<?php
namespace Training\Preference\Model;

class Product extends \Magento\Catalog\Model\Product
{
    public function getName()
    {
        $name = parent::getName();
        $price = $this->getData('price');

        if ($price < 20) {
            $name .= " - So cheap";
        } elseif ($price < 40) {
            $name .= " - Bestseller";
        } else {
            $name .= " - So bloody expensive";
        }

        return $name;
    }
}
