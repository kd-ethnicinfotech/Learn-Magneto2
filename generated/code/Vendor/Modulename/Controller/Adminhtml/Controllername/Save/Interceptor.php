<?php
namespace Vendor\Modulename\Controller\Adminhtml\Controllername\Save;

/**
 * Interceptor class for @see \Vendor\Modulename\Controller\Adminhtml\Controllername\Save
 */
class Interceptor extends \Vendor\Modulename\Controller\Adminhtml\Controllername\Save implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Vendor\Modulename\Model\EntityFactory $entityFactory, \Magento\Framework\View\Result\PageFactory $resultPageFactory, \Magento\Framework\Session\SessionManagerInterface $sessionManager)
    {
        $this->___init();
        parent::__construct($context, $entityFactory, $resultPageFactory, $sessionManager);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        return $pluginInfo ? $this->___callPlugins('dispatch', func_get_args(), $pluginInfo) : parent::dispatch($request);
    }
}
