<?php
namespace Custom\Grid\Controller\Adminhtml\Custom;

use Magento\Backend\App\Action;
use Custom\Grid\Model\GridFactory;

class Delete extends Action
{
    protected $gridFactory;

    public function __construct(
        Action\Context $context,
        GridFactory $gridFactory
    ) {
        $this->gridFactory = $gridFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = (int) $this->getRequest()->getParam('entity_id');

        if ($id) {
            try {
                $model = $this->gridFactory->create()->load($id);

                if (!$model->getId()) {
                    $this->messageManager->addErrorMessage(__('Record does not exist.'));
                    return $this->_redirect('*/*/index');
                }

                $model->delete();
                $this->messageManager->addSuccessMessage(__('Record deleted successfully.'));
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__('Error deleting record: %1', $e->getMessage()));
            }
        } else {
            $this->messageManager->addErrorMessage(__('Invalid record ID.'));
        }

        return $this->_redirect('*/*/index');
    }
}
