<?php
namespace Demo\Custom\Block;

use Magento\Framework\View\Element\Template;

class Form extends Template
{
public function getFormAction()
{
    return $this->getUrl('mycustom/index/save'); // not customform
}
}