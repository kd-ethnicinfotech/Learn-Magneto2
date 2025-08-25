<?php
namespace Rsgitech\News\Controller\Adminhtml\AllNews;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;   // ✅ Correct one!
use Magento\Framework\Registry;

class Edit extends Action
{
    protected $_coreRegistry;
    protected $resultPageFactory;

    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory,   // ✅ Framework PageFactory
        Registry $registry
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry     = $registry;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Rsgitech_News::save');
    }

    protected function _initAction()
    {
        $resultPage = $this->resultPageFactory->create();

        $resultPage->setActiveMenu('Rsgitech_News::news_allnews');
        $resultPage->addBreadcrumb(__('News'), __('News'));
        $resultPage->addBreadcrumb(__('Manage All News'), __('Manage All News'));

        return $resultPage;
    }

    public function execute()
    {
        $id = (int)$this->getRequest()->getParam('news_id');
        $model = $this->_objectManager->create(\Rsgitech\News\Model\Allnews::class);

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This news no longer exists.'));
                return $this->resultRedirectFactory->create()->setPath('*/*/');
            }
        }

        $this->_coreRegistry->register('news_allnews', $model);

        $resultPage = $this->_initAction();

        $resultPage->addBreadcrumb(
            $id ? __('Edit News') : __('Add News'),
            $id ? __('Edit News') : __('Add News')
        );

        $resultPage->getConfig()->getTitle()->prepend(__('All News'));
        $resultPage->getConfig()->getTitle()->prepend(
            $model->getId() ? $model->getTitle() : __('Add News')
        );

        return $resultPage;
    }
}
