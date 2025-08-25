<?php
namespace Custom\Grid\Ui\DataProvider;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Custom\Grid\Model\ResourceModel\Grid\CollectionFactory;

class GridDataProvider extends AbstractDataProvider
{
    protected $collection;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        return [
            'totalRecords' => $this->collection->getSize(),
            'items' => $this->collection->getData(),
        ];
    }
}
