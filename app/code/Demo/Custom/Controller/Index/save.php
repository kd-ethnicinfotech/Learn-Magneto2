<?php
namespace Demo\Custom\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Demo\Custom\Model\CustomFactory;
use Magento\Framework\Controller\Result\RedirectFactory;

class Save extends Action
{
    protected $customFactory;
    protected $resultRedirectFactory;

    public function __construct(
        Context $context,
        CustomFactory $customFactory,
        RedirectFactory $resultRedirectFactory
    ) {
        $this->customFactory = $customFactory;
        $this->resultRedirectFactory = $resultRedirectFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        if ($data) {
            try {
                $model = $this->customFactory->create();
                $model->setData([
                    'name' => $data['name'],
                    'address' => $data['address'],
                    'number' => $data['number'],
                ]);
                $model->save();
                $this->messageManager->addSuccessMessage(__('Your data has been saved.'));
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__('Error saving data.'));
            }
        }

        return $this->resultRedirectFactory->create()->setPath('mycustom/index/index');
    }
}
