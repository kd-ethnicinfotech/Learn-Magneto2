<?php
namespace Demo\Custom\Model\ResourceModel\Custom;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Demo\Custom\Model\Custom::class,
            \Demo\Custom\Model\ResourceModel\Custom::class
        );
    }
}