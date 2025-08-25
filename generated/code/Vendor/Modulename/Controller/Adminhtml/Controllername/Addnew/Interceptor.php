<?php
namespace Vendor\Modulename\Controller\Adminhtml\Controllername\Addnew;

/**
 * Interceptor class for @see \Vendor\Modulename\Controller\Adminhtml\Controllername\Addnew
 */
class Interceptor extends \Vendor\Modulename\Controller\Adminhtml\Controllername\Addnew implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Vendor\Modulename\Model\EntityFactory $entityFactory)
    {
        $this->___init();
        parent::__construct($context, $entityFactory);
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
