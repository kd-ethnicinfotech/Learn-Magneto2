<?php
namespace Admin\Grid\Block\Adminhtml\Edit;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Backend\Block\Template;

class Form extends Template
{
    protected $registry;

    public function __construct(
        Context $context,
        Registry $registry,
        array $data = []
    ) {
        $this->registry = $registry;
        parent::__construct($context, $data);
    }

    public function getRecord()
    {
        return $this->registry->registry('grid_record');
    }
}
