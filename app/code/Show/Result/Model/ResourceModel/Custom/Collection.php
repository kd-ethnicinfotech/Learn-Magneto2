<?php
namespace Show\Result\Model\ResourceModel\Custom;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Show\Result\Model\Custom::class,
            \Show\Result\Model\ResourceModel\Custom::class
        );
    }
}