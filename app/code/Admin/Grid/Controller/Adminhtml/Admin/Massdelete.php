<?php
namespace Admin\Grid\Controller\Adminhtml\Admin;

use Magento\Backend\App\Action;
use Admin\Grid\Model\ResourceModel\Grid\CollectionFactory;

class Massdelete extends Action
{
    protected $collectionFactory;

    public function __construct(
        Action\Context $context,
        CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        // Get selected IDs from mass action
        $ids = $this->getRequest()->getParam('selected', []);

        if (!is_array($ids) || empty($ids)) {
            $this->messageManager->addErrorMessage(__('Please select record(s) to delete.'));
        } else {
            try {
                $collection = $this->collectionFactory->create()
                    ->addFieldToFilter('entity_id', ['in' => $ids]);

                $count = 0;
                foreach ($collection as $item) {
                    $item->delete();
                    $count++;
                }

                $this->messageManager->addSuccessMessage(
                    __('A total of %1 record(s) have been deleted.', $count)
                );
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(
                    __('Error deleting records: %1', $e->getMessage())
                );
            }
        }

        return $this->_redirect('*/*/index');
    }
}
