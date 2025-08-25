<?php
namespace Show\Result\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Custom extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('custom_table', 'entity_id'); // table name and primary key
    }
}