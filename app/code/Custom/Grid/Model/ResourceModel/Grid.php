<?php
namespace Custom\Grid\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Grid extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('custom_grid', 'entity_id'); // table name and primary key
    }
}