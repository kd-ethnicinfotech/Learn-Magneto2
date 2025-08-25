<?php
namespace Custom\Grid\Model;

use Magento\Framework\Model\AbstractModel;

class Grid extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Custom\Grid\Model\ResourceModel\Grid::class);
    }
}
