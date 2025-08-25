<?php

declare(strict_types=1);

namespace Training\PluginExample\ViewModel;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\Registry;
use Training\PluginExample\Model\ProductKey;

class Example implements ArgumentInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    protected ProductRepositoryInterface $productRepository;

    /**
     * @var ProductKey
     */
    protected ProductKey $productKey;

    /**
     * @var Registry
     */
    protected Registry $registry;

    /**
     * Example constructor.
     *
     * @param ProductRepositoryInterface $productRepository
     * @param ProductKey                 $productKey
     * @param Registry                   $registry
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        ProductKey $productKey,
        Registry $registry
    ) {
        $this->productRepository = $productRepository;
        $this->productKey = $productKey;
        $this->registry = $registry;
    }

    public function getDefaultProductSku(): string
    {
        try {
              $product = $this->productRepository->getById(1); // fixed product ID
              return $product->getSku();
        } catch (\Exception $e) {
             return '';
        }
    }

    public function getCurrentProduct(): ?\Magento\Catalog\Model\Product
    {
        return $this->registry->registry('current_product');
    }
}
