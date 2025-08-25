<?php
namespace Training\PluginExample\Plugin;

class ProductKeyPlugin
{
    /**
     * Append SKU after product name
     *
     * @param  \Magento\Catalog\Block\Product\View $subject
     * @param  string                              $result
     * @return string
     */
    public function afterGetProductName(
        \Magento\Catalog\Block\Product\View $subject,
        $result
    ) {
        $product = $subject->getProduct();
        if ($product && $product->getSku()) {
            $result .= ' - ' . $product->getSku();
        }
        return $result;
    }
}
