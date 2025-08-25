<?php
namespace Custom\Grid\Model\ResourceModel\Grid;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Custom\Grid\Model\Grid::class,
            \Custom\Grid\Model\ResourceModel\Grid::class
        );
    }
}