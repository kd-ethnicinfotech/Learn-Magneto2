<?php
namespace Demo\Custom\Model;

use Magento\Framework\Model\AbstractModel;

class Custom extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Demo\Custom\Model\ResourceModel\Custom::class);
    }
}
