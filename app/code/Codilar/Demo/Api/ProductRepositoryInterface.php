<?php
namespace Codilar\Demo\Api;

use Codilar\Demo\Api\Data\ProductInterface;
use Magento\Framework\Exception\NoSuchEntityException;

interface ProductRepositoryInterface
{
    /**
     * Get product by ID
     *
     * @param  int $id
     * @return ProductInterface
     * @throws NoSuchEntityException
     */
    public function getProductById($id);

    /**
     * Get all products
     *
     * @return ProductInterface[]
     */
    public function getList();
}
