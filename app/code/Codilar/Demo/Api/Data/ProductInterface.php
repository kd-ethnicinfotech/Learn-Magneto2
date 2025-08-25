<?php

namespace Codilar\Demo\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface ProductInterface extends ExtensibleDataInterface
{
    /**
     * Get Product ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set Product ID
     *
     * @param  int $id
     * @return $this
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getSku();

    /**
     * @param  string $sku
     * @return $this
     */
    public function setSku($sku);


    /**
     * @return string
     */
    public function getName();

    /**
     * @param  string $name
     * @return $this
     */
    public function setName($name);

     /**
      * @return string
      */
    public function getPrice();

    /**
     * @param  string $price
     * @return $this
     */
    public function setPrice($price);

         /**
      * @return string[]
      */
    public function getImage();

    /**
     * @param  string[] $image
     * @return $this
     */
    public function setImage($image);

}





















// use Codilar\Demo\Api\ProductRepositoryInterface;
// use Magento\Catalog\Api\ProductRepositoryInterface as MagentoProductRepository;
// use Magento\Framework\Exception\NoSuchEntityException;

// class ProductInterface implements ProductRepositoryInterface
// {
//     /**
//      * @var MagentoProductRepository
//      */
//     protected $productRepository;

//     public function __construct(
//         MagentoProductRepository $productRepository
//     ) {
//         $this->productRepository = $productRepository;
//     }

//     /**
//      * {@inheritdoc}
//      */
//     public function getProductById($id)
//     {
//         try {
//             return $this->productRepository->getById($id);
//         } catch (NoSuchEntityException $e) {
//             throw $e;
//         }
//     }
// }
