<?php
namespace Swissup\SearchMysqlLegacy\Model\Adapter\Mysql\Aggregation\DataProvider;

/**
 * Interceptor class for @see \Swissup\SearchMysqlLegacy\Model\Adapter\Mysql\Aggregation\DataProvider
 */
class Interceptor extends \Swissup\SearchMysqlLegacy\Model\Adapter\Mysql\Aggregation\DataProvider implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Eav\Model\Config $eavConfig, \Magento\Framework\App\ResourceConnection $resource, \Magento\Framework\App\ScopeResolverInterface $scopeResolver, $customerSession, ?\Swissup\SearchMysqlLegacy\Model\Adapter\Mysql\Aggregation\DataProvider\SelectBuilderForAttribute $selectBuilderForAttribute = null, ?\Magento\Framework\Event\Manager $eventManager = null)
    {
        $this->___init();
        parent::__construct($eavConfig, $resource, $scopeResolver, $customerSession, $selectBuilderForAttribute, $eventManager);
    }

    /**
     * {@inheritdoc}
     */
    public function getDataSet(\Magento\Framework\Search\Request\BucketInterface $bucket, array $dimensions, \Magento\Framework\DB\Ddl\Table $entityIdsTable)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getDataSet');
        return $pluginInfo ? $this->___callPlugins('getDataSet', func_get_args(), $pluginInfo) : parent::getDataSet($bucket, $dimensions, $entityIdsTable);
    }
}
