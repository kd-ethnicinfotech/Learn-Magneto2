<?php
namespace Show\Result\Block;

use Magento\Framework\View\Element\Template;
use Show\Result\Model\ResourceModel\Custom\CollectionFactory;

class Article extends Template
{
    protected $collectionFactory;
    protected $collection;

    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    public function getCollection()
    {
        if ($this->collection === null) {
            $page = (int) ($this->getRequest()->getParam('p') ?: 1);
            $pageSize = 5;

            $this->collection = $this->collectionFactory->create()
                ->addFieldToSelect('*')
                ->setPageSize($pageSize)
                ->setCurPage($page);
        }
        return $this->collection;
    }

    public function getRows()
    {
        return $this->getCollection()->getItems(); // keeps pagination working
    }

    public function getCurPage()
    {
        return $this->getCollection()->getCurPage();
    }

    public function getLastPageNumber()
    {
        return $this->getCollection()->getLastPageNumber();
    }
}
