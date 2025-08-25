<?php
namespace Rsgitech\News\Controller\Adminhtml\AllNews\Save;

/**
 * Interceptor class for @see \Rsgitech\News\Controller\Adminhtml\AllNews\Save
 */
class Interceptor extends \Rsgitech\News\Controller\Adminhtml\AllNews\Save implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor, ?\Rsgitech\News\Model\AllnewsFactory $allnewsFactory = null, ?\Rsgitech\News\Api\AllnewsRepositoryInterface $allnewsRepository = null)
    {
        $this->___init();
        parent::__construct($context, $dataPersistor, $allnewsFactory, $allnewsRepository);
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
