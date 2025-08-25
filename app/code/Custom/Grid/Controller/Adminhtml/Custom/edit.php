<?php
namespace Custom\Grid\Controller\Adminhtml\Custom;

use Magento\Backend\App\Action;
use Magento\Framework\Registry;
use Custom\Grid\Model\GridFactory;

class Edit extends Action
{
    protected $_coreRegistry;
    protected $gridFactory;

    public function __construct(
        Action\Context $context,
        Registry $coreRegistry,
        GridFactory $gridFactory
    ) {
        $this->_coreRegistry = $coreRegistry;
        $this->gridFactory = $gridFactory;
        parent::__construct($context);
    }

    public function execute()
    {
       $id = $this->getRequest()->getParam('entity_id');
        $model = $this->gridFactory->create();

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('Record no longer exists.'));
                return $this->_redirect('custom_grid/custom/save');
            }
        }

        // Register the model so the block can access it
        $this->_coreRegistry->register('grid_record', $model);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend($id ? __('Edit Record') : __('New Record'));
        return $resultPage;
    }
}
