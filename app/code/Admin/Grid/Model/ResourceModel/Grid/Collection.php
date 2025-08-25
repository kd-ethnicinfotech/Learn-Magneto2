<?php
namespace Admin\Grid\Model\ResourceModel\Grid;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Admin\Grid\Model\Grid::class,
            \Admin\Grid\Model\ResourceModel\Grid::class
        );
    }
}