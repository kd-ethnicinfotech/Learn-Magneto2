<?php
namespace Admin\Grid\Model;

use Magento\Framework\Model\AbstractModel;

class Grid extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Admin\Grid\Model\ResourceModel\Grid::class);
    }
}
