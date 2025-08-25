<?php
namespace Custom\Grid\Ui\DataProvider;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Custom\Grid\Model\ResourceModel\Grid\CollectionFactory;
use Magento\Framework\App\RequestInterface;

class FormDataProvider extends AbstractDataProvider
{
    protected $loadedData;
    protected $request;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        RequestInterface $request,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->request = $request;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $id = (int) $this->request->getParam('entity_id');

        if ($id) {
            $item = $this->collection->getItemById($id);
            if ($item) {
                $this->loadedData[$id] = $item->getData();
            }
        } else {
            // For "Add New User", provide an empty dataset
            $this->loadedData[0] = [
            'entity_id' => '',
            'name'      => '',
            'address'   => '',
            'number'    => ''
            ];
        }

        return $this->loadedData;
    }
}
