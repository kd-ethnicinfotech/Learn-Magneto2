<?php
namespace Admin\Grid\Controller\Adminhtml\Admin;

use Magento\Backend\App\Action;
use Admin\Grid\Model\GridFactory;

class Save extends Action
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
        $data = $this->getRequest()->getPostValue();

        if (!$data) {
            $this->messageManager->addErrorMessage(__('No data found to save.'));
            return $this->_redirect('*/*/');
        }

        try {
            $id = isset($data['entity_id']) ? (int)$data['entity_id'] : 0;


            /** @var \Admin\Grid\Model\Grid $model */
            $model = $this->gridFactory->create();

            if ($id) {
                $model->load($id);
                if (!$model->getId()) {
                    $this->messageManager->addErrorMessage(__('This record no longer exists.'));
                    return $this->_redirect('*/*/');
                }
            }

            // Set form data
            $model->setData('name', $data['name'] ?? '');
            $model->setData('address', $data['address'] ?? '');
            $model->setData('number', $data['number'] ?? '');

            // Handle timestamps
            $currentTime = date('Y-m-d H:i:s');
            if (!$model->getId()) {
                // New record
                $model->setData('created_at', $currentTime);
            }
            // Always set updated_at
            $model->setData('updated_at', $currentTime);

            $model->save();

            $this->messageManager->addSuccessMessage(__('Record saved successfully.'));
            return $this->_redirect('*/*/index');
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Error: %1', $e->getMessage()));
            return $this->_redirect('*/*/edit', ['entity_id' => $data['entity_id'] ?? null]);
        }
    }
}
